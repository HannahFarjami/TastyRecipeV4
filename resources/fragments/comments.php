<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="StyleSheet"
  type="text/css"
  href="/../resources/css/comments.css"/>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.2/knockout-min.js'></script>
  <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type='text/javascript' src="/../resources/JavaScript/comments.js"></script>
</head>
<body>
 
  <div class="comments">
    <div id = "add-Comment">   
      <textarea data-bind = "textInput: message"
      placeholder='Add your comment here'>
    </textarea><br>
    <button data-bind = "click: submitComment"> Submit Your Comment </button> 
    </div>
    <div id = "show-Comments">
    <!-- ko foreach: { data: comments, as: "commentDetails"} -->
      <div class ='cmts'>
      <p id ="name" data-bind= "text: commentDetails.User"></p>
      <p id ="comment" data-bind= "text: commentDetails.Comment"></p>
      <!-- ko if: commentDetails.itWasMe --> 
      <p class='deletebtn' >
        <button data-bind="click: $parent.deleteComment">Delete Comment</button>
      </p>
      
      <!-- /ko -->
      </div>
    <!-- /ko -->
  </form>
  </div>

</div>
</body>
</html>
