const bar = document.getElementById('bar');
const nav = document.getElementById('navbar');
const cl = document.getElementById('close');


if (bar){
    bar.addEventListener('click', () =>{
        nav.classList.add('active');  // Change add to toggle
    })
}
if (cl){ 
    cl.addEventListener('click', () =>{
        nav.classList.remove('active');  // Change add to toggle
    })
}