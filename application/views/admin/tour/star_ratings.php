<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 5 star rating example using jQuery star rating plugin</title>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
</head>
<body>


<div class="container">


    <br/>

    <br/>
    <label for="input-1" class="control-label">Ratings:</label>
    <input id="rating" name="rating" class="rating rating-loading"  data-min="0" data-max="5" data-step="0.5" data-size="sm">


</div>

</body>
</html>

<script type="text/javascript">
    $(document).ready(function($) 
    {   

        $('#rating').change(function(event) {
            var ratings = $(this).val();
            alert(ratings);
        });
       
    });
</script>