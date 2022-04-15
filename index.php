<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php</title>
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>Php and ajax pagination</h1>
        </div>
        <div id="table">
            
        </div>
    </div>
    <script type="text/javascript" src="js/jsquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            function loadPage(page){
                $.ajax({
                    url: 'ajax_page.php',
                    type: 'POST',
                    data: {page_no: page},
                    success: function(data){
                        $('#table').html(data);
                    }
                });
            }
            loadPage();

            //page
            $(document).on("click", "#page a", function(e){
                e.preventDefault();
                var page = $(this).attr("id");
                loadPage(page);
            })
        });
    </script>
</body>
</html>