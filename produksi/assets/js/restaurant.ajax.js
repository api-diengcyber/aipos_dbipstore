function R_AJAX(url) {
	this.url = url;
	this.type = 'GET';
	this.data = null;
	this.processData = true;
	this.contentType = true;
}

R_AJAX.prototype = {
	constructor: R_AJAX,
	get: function(){
		this.type = 'GET';
		this.data = null;
		this.processData = true;
		this.contentType = true;
	},
	post: function(data){
		this.type = 'POST';
		this.data = data;
		this.processData = false;
		this.contentType = false;
	},
	callback: function(data){
		return $.ajax({
		  url: this.url,
		  beforeSend: function(request) {
		    request.setRequestHeader("X-Powered-By", 'AIPOS');
		  },
		  data: this.data,
		  type: this.type,
		  processData: this.processData,
		  contentType: this.contentType,
		  success: function(response){
		  	data(response);
		  },
	      error: function(xhr, status, throwError){
	        console.log(xhr.code + ' : ' + throwError);
	      }
		});
	},
}