if (document.querySelector("#mapa")) {

    const latitud = 20.988444355886447;
    const longitud =  -89.61919698710723;
    const zoom = 16; 

  const map = L.map("mapa").setView([latitud,longitud], zoom);

  L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  }).addTo(map);

  L.marker([latitud, longitud])
    .addTo(map)
    .bindPopup(`
    <h2 class="mapa__heading">DevWebCamp</h2>
    <p class="mapa__texto">Hotel Fiesta Americana</p>
    `)
    .openPopup();
}
