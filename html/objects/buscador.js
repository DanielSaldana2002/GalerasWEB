function searchGoogle() {
    let buscador = document.getElementById('buscador').value;
    const apiKey = '';
    const cx = '';
    const url = `https://www.googleapis.com/customsearch/v1?key=${apiKey}&cx=${cx}&q=${buscador}`;

    fetch(url)
      .then(response => response.json())
      .then(data => {
        const results = data.items;
        const firstResultLink = results;
        console.log(firstResultLink);
        
        // Puedes utilizar el enlace para redireccionar al usuario al primer resultado
        window.open(firstResultLink,"_blank");
        //window.location.href = firstResultLink;
      })
      .catch(error => console.error(error));
  }