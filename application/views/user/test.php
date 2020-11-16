<!DOCTYPE html>
<html>
    <head>
        <title>Collect time</title>
        
    </head>
    <body>
    <script>
var t1 = new Date();
var t2 = new Date('2022-11-15T10:17:28.593Z');
console.log(t1);

console.log(t2);
var dif = t2.getTime() - t1.getTime();

console.log(dif); // This time difference is presented in milliseconds
// alert(t1+", \n"+t2+", \n"+dif);

</script>
</body>

</html>