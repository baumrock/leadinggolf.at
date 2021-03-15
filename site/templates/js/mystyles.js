/**
 * mystyles.js
 *
 * This file may be used when you have "Styles" as one of the items in your toolbar.
 *
 * For a more comprehensive example, see the file ./ckeditor-[version]/styles.js
 *
 */
CKEDITOR.stylesSet.add( 'mystyles', [
 { name: 'Small', element: 'small' },
 { name: 'Link w. Arrow', element: 'a', attributes: { 'class': 'a--arrow' } },
 { name: 'Button Link', element: 'a', attributes: { 'class': 'btn btn--primary a--arrow' } }
] );
