<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
function Greetings($hours)
{
    if ($hours >= 0 && $hours <= 12) {
        return "Good Morning.";
    } else {
        if ($hours > 12 && $hours <= 17) {
            return "Good Afternoon.";
        } else {
            if ($hours > 17 && $hours <= 20) {
                return "Good Evening";
            } else {
                return "Good Night";
            }
        }
    }
}
$hours = 13;
print Greetings($hours);
?>
    </body>
</html>