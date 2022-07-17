const {registerBlockType} = wp.blocks;
const {apiFetch} = wp;
const {useState, useEffect} = wp.element;
const {date} = wp.date;
const {useSelect} = wp.data;
import classnames from "classnames";
const {InspectorControls, useBlockProps} = wp.blockEditor;
const {
  PanelBody,
  SelectControl,
  RangeControl,
  ColorPicker,
  Spinner,
} = wp.components;
import "../css/blocks.scss";
registerBlockType("events/all-events", {
  apiVersion: 2,
  title: "Все События",
  category: "common",
  supports: {},
  attributes: {
    quantity: {
      type: "number",
      default: 6,
    },
    borderRadius: {
      type: "string",
    },
    borderWeight: {
      type: "string",
    },
    borderColor: {
      type: "string",
    },
  },
  edit: (props) => {
    console.log(props);
    const {
      attributes: {quantity, borderRadius, borderWeight, borderColor},
      setAttributes,
    } = props;
    const blockProps = useBlockProps({
      className: classnames("events-posts-block", "entries", "clr"),
    });
    let results = null;
    // const [events, setEvents] = useState([]);
    // useEffect(() => {
    //   apiFetch({path: "maverick/v1/events"}).then((events) => {
    //     console.log(events);
    //     setEvents(events);
    //   });
    // }, [quantity]);
    // console.log(events);
    const events = useSelect(
      (select) => {
        return select("core").getEntityRecords("postType", "events", {
          per_page: quantity,
        });
      },
      [quantity]
    );
    console.log(events);
    return (
      <>
        <InspectorControls>
          <PanelBody>
            <SelectControl
              label="Кол-во на страницу"
              value={quantity}
              options={[
                {label: "1", value: 1},
                {label: "2", value: 2},
                {label: "3", value: 3},
                {label: "6", value: 6},
              ]}
              onChange={(val) => setAttributes({quantity: val})}
            />
          </PanelBody>
          <PanelBody>
            <RangeControl
              label="Радиус границы"
              value={borderRadius}
              min="0"
              max="50"
              onChange={(val) => setAttributes({borderRadius: val})}
            />
            <RangeControl
              label="Ширина границы"
              value={borderWeight}
              min="0"
              max="6"
              onChange={(val) => setAttributes({borderWeight: val})}
            />
          </PanelBody>
          <PanelBody>
            <ColorPicker
              color={borderColor}
              onChangeComplete={(color) => {
                let colorString;
                if ("undefined" === typeof color.rgb || 1 === color.rgb.a) {
                  colorString = color.hex;
                } else {
                  const {r, g, b, a} = color.rgb;
                  colorString = `rgba(${r}, ${g}, ${b}, ${a})`;
                }
                setAttributes({borderColor: colorString || ""});
              }}
              disableAlpha={true}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps} id="blog-entries">
          {events ? (
            events.map((event) => (
              <article className="large-entry blog-entry clr">
                <div className="blog-entry-inner clr">
                  <div className="thumbnail">
                    <a href={event.link}>
                      <img src={event.events_featured_image} alt="" />
                    </a>
                  </div>
                  <header>
                    <h2 className="blog-entry-header">
                      {event.title.rendered}
                    </h2>
                  </header>
                  <ul className="meta obem-default clr">
                    <li className="meta-author">{event.author_name}</li>
                    <li className="meta-date">{date("j F, Y", event.date)}</li>
                    <li className="meta-cat">
                      <a href={event.events_cat_obj[0].link}>
                        {event.events_cat_obj[0].name}
                      </a>
                    </li>
                  </ul>
                  <div className="blog-entry-summary">
                    <div className="events_extra-cols">
                      <p
                        className="date-event"
                        style={{
                          borderRadius: `${borderRadius}px`,
                          borderWidth: `${borderWeight}px`,
                          borderStyle: "solid",
                          borderColor: borderColor,
                        }}
                      >
                        {date("j F", event.acf.date_event)}
                      </p>
                      <p className="location-event">
                        {event.acf.location_event}
                      </p>
                    </div>
                    <p
                      dangerouslySetInnerHTML={{__html: event.content.rendered}}
                    ></p>
                  </div>
                  <div className="blog-entry-readmore">
                    <a href={event.link}>Продолжить чтение</a>
                  </div>
                </div>
              </article>
            ))
          ) : (
            <Spinner />
          )}
        </div>
      </>
    );
  },
  save: () => {
    return null;
  },
});
