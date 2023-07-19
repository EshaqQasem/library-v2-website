function bookdetails(id){
    alert('hiii');
    document.getElementById('bookscontainer').innerText='00000000000000000000000000000000000000000000000000000000000000000000<hr>000000000000';
    alert('hiii');
    
}
var flag=false;
function showMobileNav()
{
 if(!flag)
 { 
//document.getElementsByClassName('btnShownav')[0].style.content='x';
document.getElementById('nav').classList='mobilenav';
document.getElementsByClassName('container')[0].style.display='none';
/*
document.getElementsByTagName('main')[0].style.display='none';
document.getElementsByTagName('footer')[0].style.display='none';
document.getElementsByClassName('copyright')[0].style.display='none';
*/
flag=true; 
} 
else{
    document.getElementById('nav').classList='nav';
    document.getElementsByClassName('container')[0].style.display='block';
    /*
document.getElementsByTagName('main')[0].style.display='block';
document.getElementsByTagName('footer')[0].style.display='flex';
document.getElementsByClassName('copyright')[0].style.display='block';
*/
flag=false; 
}
}

var flag2=false;
function showAside()
{
  if(!flag2)
  {
  //document.getElementsByClassName('bookscontainer')[0].style.display='none';
  //document.getElementsByClassName('bookscontainer')[0].style.left='-300px';
  //document.getElementsByClassName('bookscontainer')[0].style.opacity='0.1';
  document.getElementsByTagName('aside')[0].style.width='300px'; 
  document.getElementsByTagName('aside')[0].style.display='block';
   
    flag2=true;
  }
  else {
    document.getElementsByTagName('aside')[0].style.display='none';
    document.getElementsByClassName('bookscontainer')[0].style.display='block';
    
 flag2=false;
  }
}