const { registerBlockType } = wp.blocks
const { RichText, InspectorControls, ColorPalette, MediaUpload } = wp.editor
const { PanelBody, IconButton } = wp.components

registerBlockType('mytheme/custom-cta', {
  // built-in attributes
  title: 'Call to Action',
  description: 'Block to generate a custom Call to Action',
  icon: 'format-image',
  category: 'layout',

  // custom attributes
  attributes: {
    title: {
      type: 'string',
      source: 'html',
      selector: 'h2',
    },
    titleColor: {
      type: 'string',
      default: 'black',
    },
    body: {
      type: 'string',
      source: 'html',
      selector: 'p',
    },
    bodyColor: {
      type: 'string',
      default: 'black',
    },
    backgroundImage: {
      type: 'string',
      default: null,
    },
  },

  // built-in functions
  edit({ attributes, setAttributes }) {
    const { title, body, titleColor, bodyColor, backgroundImage } = attributes
    // custom functions
    function onChangeTitle(newTitle) {
      setAttributes({ title: newTitle })
    }
    function onChangeBody(newBody) {
      setAttributes({ body: newBody })
    }
    function onTitleColorChange(newColor) {
      setAttributes({ titleColor: newColor })
    }
    function onBodyColorChange(newColor) {
      setAttributes({ bodyColor: newColor })
    }
    function onSelectImage(newImage) {
      setAttributes({ backgroundImage: newImage.sizes.full.url })
    }
    return [
      <InspectorControls style={{ marginBottom: '40px' }}>
        <PanelBody title={'Font Color Settings'}>
          <p>
            <strong>Select a Title Color</strong>
          </p>
          <ColorPalette value={titleColor} onChange={onTitleColorChange} />
          <p>
            <strong>Select a Body Color</strong>
          </p>
          <ColorPalette value={bodyColor} onChange={onBodyColorChange} />
        </PanelBody>
        <PanelBody title={'Background Image Settings'}>
          <p>
            <strong>Select a Background Image</strong>
          </p>
          <MediaUpload
            onSelect={onSelectImage}
            type="image"
            value={backgroundImage}
            render={({ open }) => (
              <IconButton
                onClick={open}
                icon="upload"
                className="editor-media-playholder__button is-button is-default is-large"
              >
                Background Image
              </IconButton>
            )}
          />
        </PanelBody>
      </InspectorControls>,
      <div class="cta-container">
        <RichText
          key="editable"
          tagName="h2"
          placeholder="Your CTA Title"
          value={title}
          onChange={onChangeTitle}
          style={{ color: titleColor }}
        />
        <RichText
          key="editable"
          tagName="p"
          placeholder="Your CTA Description"
          value={body}
          onChange={onChangeBody}
          style={{ color: bodyColor }}
        />
      </div>,
    ]
  },
  save({ attributes }) {
    const { title, body, titleColor, bodyColor } = attributes
    return (
      <div class="cta-container">
        <h2 style={{ color: titleColor }}>{title}</h2>
        <RichText.Content
          tagName="p"
          value={body}
          style={{ color: bodyColor }}
        />
      </div>
    )
  },
})
