<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Content</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div id="navbar">
    <button id="page1">Page 1</button>
    <button id="page2">Page 2</button>
</div>

<div id="content">
    <!-- Content will be loaded here -->
</div>

<script>
    $(document).ready(function(){
        // Load initial content
        $('#content').load('page2.php');

        // Handle button clicks
        $('#page1').click(function(){
            $('#content').load('page1.php');
        });

        $('#page2').click(function(){
            $('#content').remove;
            $('#content').load('page2.php');
        });
    });
</script>

</body>
</html>