//<-- Variables start -->
let S_List = document.getElementById('StudentsList');
let S_Radio = document.getElementById('Students');
let C_List = document.getElementById('ClassesList');
let C_Radio = document.getElementById('Classes');
//<--  Variables end  --> 

console.log("Hello, World!!")
S_Radio.onclick = function(){
    S_List.style.display="block";
    C_List.style.display="none";
}
C_Radio.onclick = function(){
    C_List.style.display="block";
    S_List.style.display="none";
}


function LoadFunc(){

    C_List.style.display="none";

}