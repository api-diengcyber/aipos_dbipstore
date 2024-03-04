function WebSocketClient(){
	this.autoReconnectInterval = 5*1000; // ms
}

WebSocketClient.prototype.open = function(url){
	this.url = url;
	this.instance = new WebSocket(this.url);
	var that = this;
	this.instance.onopen = function(evt){
		that.onopen(evt);
	};
	this.instance.onmessage = function(data){
		that.onmessage(data);
	};
	this.instance.onclose = function(e){
		switch (e.code){
		case 1000:	// CLOSE_NORMAL
			console.log("WebSocket: closed");
			break;
		default:	// Abnormal closure
			that.reconnect(e);
			break;
		}
		that.onclose(e);
	};
	this.instance.onerror = function(e){
		switch (e.code){
		case 'ECONNREFUSED':
			that.reconnect(e);
			break;
		default:
			that.onerror(e);
			break;
		}
	};
}

WebSocketClient.prototype.send = function(data,option){
	try{
		this.instance.send(data,option);
	}catch (e){
		console.log('error', e);
	}
}

WebSocketClient.prototype.reconnect = function(e){
	console.log('WebSocketClient: retry in '+this.autoReconnectInterval+'ms');
	var that = this;
	setTimeout(function(){
		console.log("WebSocketClient: reconnecting...");
		that.open(that.url);
	},this.autoReconnectInterval);
}

WebSocketClient.prototype.onopen = function(e){	console.log("WebSocketClient: open"); }
WebSocketClient.prototype.onmessage = function(data){ console.log("WebSocketClient: message"); }
WebSocketClient.prototype.onerror = function(e){ console.log("WebSocketClient: error"); }
WebSocketClient.prototype.onclose = function(e){ console.log("WebSocketClient: closed");	}