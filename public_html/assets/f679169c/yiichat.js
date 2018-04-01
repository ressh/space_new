var YiiChat = function(options){
	this.run = function(){

	var clear = function(){
		send.attr('disabled',null);
		msg.attr('disabled',null);
	}

	var busy = function(){
		send.attr('disabled','disabled');
		msg.attr('disabled','disabled');
	}

	var actionPost = function(text, callback){
		busy();
		jQuery.ajax({ cache: false, type: 'post', 
			url: options.action+'&action=sendpost&data=not_used',
			data: { chat_id: options.chat_id, identity: options.identity, 
				text: text},
			success: function(post){
				if(post == null || post == ""){
					options.onError('post_empty','');
				}else	
				if(post == 'REJECTED'){
					options.onError('post_rejected',text);
					callback(false);
				}else{
					add(post);
					callback(true);
					options.onSuccess('post',text,post);
				}
				clear();
			},
			error: function(e){
				clear();
				options.onError('send_post_error',e.responseText,e);
				callback(false);
			}
		});
	}

	var actionInit = function(callback){
		busy();
		jQuery.ajax({ cache: false, type: 'post', 
			url: options.action+'&action=init&data=not_used',
			data: { chat_id: options.chat_id, identity: options.identity },
			success: function(_posts){
				if(_posts == null || _posts == ""){
					options.onError('init_empty','');
				}else	
				if(posts == 'REJECTED'){
					options.onError('init_rejected',text);
				}else{
					// _posts.chat_id, _posts.identity, _posts.posts
					jQuery.each(_posts.posts, function(k,post){
						add(post);
					});	
					options.onSuccess('init','');
					callback();
				}
				clear();
			},
			error: function(e){
				clear();
				options.onError('init_error',e.responseText,e);
			}
		});
	}

	var actionTimer = function(){
		var last_id = '';
		var lastPost = posts.find('.post:not(.yiichat-post-myown):last');
		var data = lastPost.data('post'); //data setted in add method
		if(data != null)
			last_id = data.id;
		//log.html('last_id='+last_id);
		jQuery.ajax({ cache: false, type: 'post', 
			url: options.action+'&action=timer&data=not_used',
			data: { chat_id: options.chat_id, identity: options.identity, 
				last_id: last_id },
			success: function(_posts){
				if(_posts == null || _posts == ""){
					options.onError('timer_empty','');
				}else	
				if(posts == 'REJECTED'){
					options.onError('timer_rejected',text);
				}else{
					// _posts.chat_id, _posts.identity, _posts.posts
					var hasPosts=false;
					jQuery.each(_posts.posts, function(k,post){
						add(post);
						hasPosts=true;
					});	
					options.onSuccess('timer','');
					if(hasPosts==true)
						scroll();
				}
			},
			error: function(e){
				options.onError('timer_error',e.responseText,e);
			}
		});
	}

	// fields: 
	//	id: postid, owner: 'i am', time: 'the time stamp', text: 'the post'
	//  chat_id: the_chat_id, identity: whoami_id	
	var add = function(post){
		posts.append("<div id='"+post.id+"' class='post'>"
			+"<div class='track'></div>"
			+"<div class='text'></div>"
		+"</div>");
		var p = posts.find(".post[id='"+post.id+"']");
		p.data('post',post);
		var flag=false;
		if(options.identity == post.post_identity)
			{ p.addClass('yiichat-post-myown'); flag=true; }
		if(flag == true){
			if(options.myOwnPostCssStyle != null){
				p.removeClass('yiichat-post-myown');
				p.addClass(options.myOwnPostCssStyle);
			}
		}else{
			if(options.othersPostCssStyle != null)
				p.addClass(options.othersPostCssStyle);
		}

		post.data = post.data.replace('"','');
		post.data = post.data.replace(';','');

		var arr =  post.data.split(':');
		var arr2 =   arr[2].split('|');



		var str1 = "";
		var str2 = "";
		var str3 = "";
		var str4 = "";

		if( arr2[0] != '' )
		{
			str1 = 	"<img src='" + arr2[0] + "' width='60' style='position: absolute; top: -7px; left:20px;'>";
		}

		if( arr2[1] != '' ) {
			str2 = "<img src='" + arr2[1] + "' width='60' style='position: absolute; top: -7px; left:20px;'>";
		}

		if( arr2[2] != '' ) {
			str3 = "<img src='" + arr2[2] + "' width='60' style='position: absolute; top: -7px; left:20px;'>";
		}

		if( arr2[3] != '"' ){
			var def = arr2[3].slice(0,-1);
			str4 = "<img src='" + def + "' width='60' style='position: absolute; top: -7px; left:20px;'>";
		}

		p.find('.track').html("<div class='time'>"+post.time+"</div>"
			+"<div class='owner'>"+post.owner

			+"<div style='position: relative;'>" +
			str1 +
			str2 +
			str3 +
			str4 +
			"</div>" +

			"</div>"


		);

		p.find('.text').html(post.text);
	}

	var scroll = function(){
		//window.location = '#'+posts.find('.post:last').attr('id');
		var h=0;
		posts.find('.post').each(function(k){
			h += $(this).outerHeight();
			console.log( $(this).outerHeight() );
		});
		posts.scrollTop(h+1000);
	}

	//
	//
	var chat = jQuery(options.selector);
	chat.addClass('yiichat');
	chat.html("<div class='posts'>posts</div><div class='you'>you</div><div class='log'></div>");
	var posts = chat.find('div.posts');
	var you = chat.find('div.you');
	var log = chat.find('div.log');

	if( window.location.href == "http://space.local/" || window.location.href == "http://space.local/site/index" || window.location.href == "http://spacewarsgame.ru/site/index" || window.location.href == "http://spacewarsgame.ru/" )
	{
		you.html("Зарегистрируйтесь, чтобы оставлять сообщения");

	}
	else {
		you.html("<textarea id='textarea' style='width: 468px; height:103px;'></textarea><div class='exceded'></div>");
	you.append("<button>Сообщение</button>");
	}

	posts.html("");


	var send = you.find('button');
	var msg = you.find('textarea');
	send.click(function(){
		var text = jQuery.trim(msg.val());
		if(text.length<options.minPostLen){
			options.onError('very_short_text',text);
		}else
		if(text.length > options.maxPostLen){
			options.onError('very_large_text',text);
		}
		else
		actionPost(text, function(ok){
			if(ok==true){
				msg.val("");
				scroll();
				setTimeout(function(){ msg.focus(); },100);
			}
		});
	});
	msg.keyup(function(e){
		var text = jQuery.trim(msg.val());
		if(text.length > options.maxPostLen){
			msg.css({ color: 'red' });
			msg.parent().find(".exceded").text("size exceded");
		}else{
			msg.css({ color: 'black' });
			msg.parent().find(".exceded").text("");
		}
	});
	var launchTimer = function(){
		setTimeout(function(){
			try{
				actionTimer();
			}catch(e){}
			launchTimer();		
		},options.timerMs);	
	}
	actionInit(scroll);
	launchTimer();
	};
} //end
