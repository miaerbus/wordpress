const { registerBlockType } = wp.blocks

registerBlockType('mytheme/custom-cta', {
  // built-in attributes
  title: 'Call to Action',
  description: 'Block to generate a custom Call to Action',
  icon: 'format-image',
  category: 'layout',

  // custom attributes
  attributes: {},

  // custom functions

  // built-in functions
  edit() {
    return <div>hello world!</div>
  },
  save() {},
})
