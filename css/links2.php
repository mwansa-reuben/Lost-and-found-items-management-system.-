<html>
<script src="https://kit.fontawesome.com/64d58efce2.js"></script>
<link rel="stylesheet" href="https://res.fgr.co.zm/css/style.css">
<link rel="stylesheet" href="https://res.fgr.co.zm/css/def.css">
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/def.css">
<link rel="stylesheet" href="./loader/loader.css">
<script src="./js/ajax.js"></script>
<script src="./js/jquery.js"></script>
<script src="./js/variables.js"></script>
<script src="./js/functionapi.js"></script>
<script src="./loader/loader.js"></script>
<script src="./js/customvals.js"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Russo+One&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Russo+One&display=swap');
::-webkit-scrollbar{
    width: 2px;
    height: 2px;
}
::-webkit-scrollbar-thumb{
    background: rgb(175, 80, 175);
}
body {
    margin: none;
    padding: none;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
textarea{
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    line-height: 25px;
    font-size: 16px;
    outline: none;
}
.spin, .submit-spin {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    border-left: 2px white dotted;
    border-top: 2px white solid;
    border-right: 2px white solid;
    border-bottom: 2px transparent solid;
    margin-left: 5px;
    animation: spin-it 2s linear infinite;
}
.submit-spin{
    width: 12px;
    height: 12px;
    border-left: 3px #1F618D solid;
    border-top: 3px #1F618D solid;
    border-right: 3px #1F618D solid;
    border-bottom: 3px transparent solid;
}

@keyframes spin-it {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}
</style>

</html>