require('./bootstrap');

import Viewer from 'viewerjs';

Viewer.setDefaults({
	toolbar: 0,
})

var //image = document.getElementById('image'),
	images = document.getElementById('gallery');
	
//const viewer = new Viewer(image);
if (images){
	const gallery = new Viewer(images);
}

