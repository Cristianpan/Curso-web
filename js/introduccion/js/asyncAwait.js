function descargarClientes() {
  return new Promise((resolve) => {
    console.log("Descargando clientes... espere...");
    setTimeout(() => {
      resolve("Los clientes fueron descargados");
    }, 5000);
  });
}
function descargarPedidos() {
  return new Promise((resolve) => {
    console.log("Descargando pedidos... espere...");
    setTimeout(() => {
      resolve("Los pedidos fueron descargados");
    }, 3000);
  });
}


async function app() {
    try{
        /* const clientes = await descargarClientes();
        const pedidos = await descargarPedidos();  
        console.log(clientes); 
        console.log(pedidos);  */

        const result = await Promise.all([descargarClientes(), descargarPedidos()]);
        console.log(`Clientes ${result[0]}`); 
        console.log(`Pedidos ${result[1]}`);  
    } catch (error) {
        console.log(error)
    } 
}

app(); 