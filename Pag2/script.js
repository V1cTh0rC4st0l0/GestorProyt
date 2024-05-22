 // Llamando a la función getData() al cargar la página
    document.addEventListener("DOMContentLoaded", getData);
 
  document.getElementById("campo").addEventListener("keyup",getData)
 // Función para obtener datos con AJAX
 function getData() {
     let input = document.getElementById("campo").value
     let content = document.getElementById("content")
     let url= "load.php"

     let formaData = new FormData()
     formaData.append('campo', input)
     

     fetch("load.php", {
             method: "POST",
             body: formaData,
             headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json'
          }
         })
         .then(response => response.json())
         .then(data => {
             content.innerHTML = data
         })
         .catch(err => console.log(err))
 }