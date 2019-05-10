  window.onload=function (){
                                
    var check=document.getElementById("num").value;


            if(check!=0)
        {
            document.getElementById("show").style.display = "none";
            document.getElementById("data2").style.display = "block";
            document.getElementById("data1").style.display = "none";
            document.getElementById("hide").style.display = "block";
        }
        else
        {
            document.getElementById("show").style.display = "block";
            document.getElementById("data2").style.display = "none";
            document.getElementById("data1").style.display = "block";
            document.getElementById("hide").style.display = "none";
        }
            
    }
        
    function Show(){
    document.getElementById("show").style.display = "none";
    document.getElementById("data2").style.display = "block";
    document.getElementById("data1").style.display = "none";
    document.getElementById("hide").style.display = "block";
    }
    function Hide(){
       
    document.getElementById("show").style.display = "block";
    document.getElementById("data2").style.display = "none";
    document.getElementById("data1").style.display = "block";
    document.getElementById("hide").style.display = "none";
    }
    

