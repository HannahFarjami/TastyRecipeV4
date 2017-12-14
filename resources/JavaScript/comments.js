$(document).ready(function(){


	function showComments(){
		var self = this;
		self.comments = ko.observableArray();
		self.username = getUsername();
		self.getComments = function (){

				$.getJSON("http://localhost/TastyRecipe/View/GetComments", "url="+location.href ,function(commentsFromDB){
					
					for(var i = 0 ; i<commentsFromDB.length; i++){
						commentsFromDB[i].itWasMe = false;
						if(username === commentsFromDB[i].User){
							commentsFromDB[i].itWasMe = true;
						}
						self.comments.unshift(commentsFromDB[i]);
					}
				});
		}
		self.deleteComment = function(comment){
			self.comments.remove(comment);
			$.post("http://localhost/TastyRecipe/View/DeleteComment", "Id="+ ko.toJS(comment.ID));
		}
		self.getComments();
	}

	function addComment() {
		var self = this;
		self.username = getUsername();
		self.message = ko.observable("");	
		self.submitComment = function (){
			if(self.message() != "") {
				if(username != "Login"){
					$.post("http://localhost/TastyRecipe/View/SubmitComment", "message=" + ko.toJS(self.message) + "&url=" + location.href);
					self.message("");
				}else{
				alert("You need to be loged in to comment!");
				}
			}
		}
	}

	function getUsername(){
		username ="";
		$.getJSON("http://localhost/TastyRecipe/View/GetUser",function(user){
			username = user;
		});
		return username;
	}

	ko.applyBindings(new addComment(), document.getElementById('add-Comment'));
	ko.applyBindings(new showComments(), document.getElementById('show-Comments'));
});