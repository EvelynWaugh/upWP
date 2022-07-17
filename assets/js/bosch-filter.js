(function ($) {
  console.log(BOSCH_DATA);
  class FilterWidget {
    constructor(data) {
	  this.searchTimeOut;
      this.filterContainer = $(".module-theme-filter");
      this.navTabs = this.filterContainer.find(".btn-link");
      this.contentTabs = $(".module-theme-filter-block-checklist");
	  this.filterButtonToggle = $(".filter-toggle");
	  this.contentBlock = $('.foldable-content');
	  this.openedContent = true;
      this.siteUrl = data.site_url;
	  this.endpointUrl = `${this.siteUrl}wp-json/maverick/v1/filter/?`
	  this.form = $('#events-form-filter');
      //period
      this.periodRange = $("#period_range_select");
      this.periodMenu = $(".period-menu li a");
	  this.searchField = $('#theme-filter-search');
	  this.postContainer = $('.themes-container');
	  this.activeFilterContainer = $('.filter-references');
	  this.resetFiltersButton = $('.reset-filter');
	  this.resetMainButton = $(".btn-reset-filter");
	//query
	this.query = new URLSearchParams();
	//states
	this.filters = data.filters;
	this.activeFilters = {
		cat: [], //category
		tag: [], //tags
		search: "",
		location: [], //location
		period: [],
		madness: [], //maddness
	};
	this.searchString = "";
	this.formString = "";
      //eventa
      this.navTabs.each((i, el) => {
        $(el).on("click", this.manageTabs.bind(this));
      });
      this.periodMenu.each((i, el) => {
        $(el).on("click", this.manageDropdown.bind(this));
      });

	  this.dateTo = $('#date_to').flatpickr({
		maxDate: 'today'
	  });

	  this.dateFrom = $('#date_from').flatpickr({
		maxDate: 'today',
		onChange: (selectedDates, dateStr, instance) => {
			this.dateTo.set("minDate", new Date(dateStr));
		}
	  });

	  this.filterButtonToggle.on('click', this.filterToggle.bind(this));
	  this.form.on('change', this.handleForm.bind(this));
	  this.searchField.on('keyup', this.search.bind(this));
	  this.resetMainButton.on("click", this.handleResetButton.bind(this));

	 $(document.body).on('click', '.filter-reference-label', this.handleActiveFilters.bind(this)) 
	
    }
	search(e) {
		if(this.searchTimeOut) {
			clearTimeout(this.searchTimeOut);
		}
		this.searchTimeOut = setTimeout(async () => {
			this.searchString = "search=" + e.target.value
			await $.ajax({
				url: this.endpointUrl + (this.formString !== "" ? this.formString + "&" : "") + 'search=' + e.target.value,
				type:'GET'
			}).then(res => {
				console.log(res);
				this.postContainer.html(res.html);
			} )
		}, 500)
		
	}
    manageTabs(e) {
      console.log(e.target.attributes);
      let attr = e.target.attributes["data-filter-type"].nodeValue;
      this.contentTabs.each(function () {
        $(this).parent().removeClass("active");
      });
      $(`[data-target=${attr}]`).parent().addClass("active");
      console.log(attr);
    }

    manageDropdown(e) {
      e.preventDefault();
      let option = e.target.attributes["data-option"].nodeValue;
      $("option:selected", this.periodRange).removeAttr("selected");

      this.periodRange
        .find("option")
        .eq(option - 1)
        .attr("selected", "selected");
      $(".dropdown .dropdown-toggle").html(
        this.periodRange
          .find("option")
          .eq(option - 1)
          .html()
      );
      this.periodRange.trigger("change");
    }
	filterToggle() {
		this.openedContent = ! this.openedContent;
		if(this.openedContent) {
			this.contentBlock.slideDown(800)
		}
		else {
			this.contentBlock.slideUp(800)
		}
	}
	handleForm() {
		this.buildQueryString();
		this.sendRequest();
		this.refreshActives();
	}

	buildQueryString() {
		let $query = this.form.serializeArray();
		let cats = []; //category
		let tags = []; //tags
		let search = "";
		let location = []; //location
		let period = [];
		let madness = [];
		$query.forEach(el => {
			el.name == "cat" && cats.push(el.value);
			el.name == "tag" && tags.push(el.value);
			el.name == "location_event" && location.push(el.value);
	
			(el.name == "period" ||
			  el.name == "date_from" ||
			  el.name == "date_to") &&
			  period.push(el.value);
	
			el.name == "event_madness" && madness.push(el.value);
		
		
		})
		this.activeFilters = {
			cat: cats, //category
			tag: tags, //tags
			search: this.searchField.val(),
			location: location, //location
			period: period,
			madness: madness, //maddness
		};
		for (let key in this.activeFilters) {
		
			this.query.delete(key);
			if ( Array.isArray(this.activeFilters[key]) && this.activeFilters[key].length > 0) {
			  this.query.append(key, this.activeFilters[key].join(","));
			}
			
		  }

		console.log($query, this.query.toString());

	}
	sendRequest() {
		this.formString = this.query.toString();
		$.ajax({
			url: this.endpointUrl + this.query.toString() + (this.searchString !== "" ? '&' + this.searchString : ''),
			type: 'GET',
		}).then(res => {
			console.log(res);
			this.postContainer.html(res.html);
		})
	}

	refreshActives() {
		this.activeFilterContainer.fadeOut();
		this.activeFilterContainer.find(".filter-li").remove();
		console.log(this.activeFilters);
		for (let key in this.activeFilters) {
		  if (this.activeFilters[key].length > 0 && key !== "search") {
			let actives = this.activeFilters[key]
			  .filter((el) => el !== "" && el !== "day")
			  .map((option) => {
				let period = false;
  
				return `<li class="filter-li"><div class="filter-reference-label" data-folder="${key}" data-option="${option}">${option} <span class="icon icon-close"></span></div></li>`;
			  })
			  .join("");
  
			this.resetFiltersButton.before(actives);
			if (actives.trim() !== "") {
			  this.activeFilterContainer.fadeIn();
			}
		  }
		  if (key === "search" && this.activeFilters["search"] !== "") {
			let val = this.activeFilters["search"];
			this.resetFiltersButton.before(
			  `<li class="filter-li"><div class="filter-reference-label" data-folder="${key}" data-option="${val}">${val} <span class="icon icon-close"></span></div></li>`
			);
			this.activeFilterContainer.fadeIn();
		  }
		}
	  }
	  handleActiveFilters(e) {
		let folder = e.target.attributes["data-folder"].nodeValue;
      	let option = e.target.attributes["data-option"].nodeValue;

      if (this.activeFilters.hasOwnProperty(folder) && folder !== "search") {
        if (this.activeFilters[folder].includes(option)) {
          let index = this.activeFilters[folder].indexOf(option);
          let options = this.activeFilters[folder].splice(index, 1);
		
          this.activeFilters = {
            ...this.activeFilters,
            [folder]: this.activeFilters[folder],
          };
		  
          $(`input[name="${folder === 'location' ? 'location_event' : ( folder === 'madness' ? 'event_madness' : folder )}"][value="${option}"]`).prop(
            "checked",
            false
          );
          if (folder == "period") {
            if (option === $("#date_from").val()) {
              this.dateFrom.clear();
            }
            if (option === $("#date_to").val()) {
              this.dateTo.clear();
            }
            if (
              option === "week" ||
              option == "lastweek" ||
              option == "month" ||
              option == "quarter" ||
              option == "year"
            ) {
              this.periodRange.val("day");
            }
          }
        }
      }
      if (folder === "search") {
        this.activeFilters = {
          ...this.activeFilters,
          search: "",
        };
        this.searchField.val("");
        this.searchString = "";
      }

      this.buildQueryString();
      this.sendRequest();
      this.refreshActives();
	  }

	  handleResetButton() {
		
		this.activeFilters = {
			cat: [], 
			tag: [],
			search: "",
			location: [],
			period: [],
			madness: [], 
		};
		  for (let key in this.activeFilters) {
			if (key === "period") {
			  this.periodRange.val("day");
			}
			if (key === "search") {
			  this.searchField.val("");
			  this.searchString = "";
			}
			$(`input[name="${key}"]`).prop("checked", false);
		  }
		  this.dateFrom.clear();
		  this.dateTo.clear();
		  this.buildQueryString();
		  this.sendRequest();
		  this.refreshActives();
	  }
  }

  const filter = new FilterWidget(BOSCH_DATA);
})(jQuery);
