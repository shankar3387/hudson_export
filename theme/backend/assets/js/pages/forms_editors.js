$(function(){$('#bs-markdown').markdown({iconlibrary:'fa',footer:'<div id="md-character-footer"></div><small id="md-character-counter" class="text-muted">350 character left</small>',onChange:function(e){var contentLength=e.getContent().length;if(contentLength>350){$('#md-character-counter').removeClass('text-muted').addClass('text-danger').html((contentLength-350)+' character surplus.');}else{$('#md-character-counter').removeClass('text-danger').addClass('text-muted').html((350-contentLength)+' character left.');}},});$('#markdown').trigger('change');$('.md-editor .fa-header').removeClass('fa fa-header').addClass('fas fa-heading');$('.md-editor .fa-picture-o').removeClass('fa fa-picture-o').addClass('far fa-image');});$(function(){if(!window.Quill){return $('#quill-editor,#quill-toolbar,#quill-bubble-editor,#quill-bubble-toolbar').remove();}
var editor=new Quill('#quill-editor',{modules:{toolbar:'#quill-toolbar'},placeholder:'Type something',theme:'snow'});var bubbleEditor=new Quill('#quill-bubble-editor',{placeholder:'Compose an epic...',modules:{toolbar:'#quill-bubble-toolbar'},theme:'bubble'});});