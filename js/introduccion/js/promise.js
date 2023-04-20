//Promise
/**
 * Promise
 * Tiene 3 estados:
 * Pending: No se resuelve ni se rechaza
 * Fulfiled: Ya se cumplio
 * Rejected: Se ha rechazado o no se pudo cumplir
 */

const usuarioAutenticado = new Promise((resolve, reject) => {
  const auth = false;

  if (auth) {
    resolve("Usuario Autenticado");
  } else {
    reject("No se pudo iniciar sesión");
  }
});

usuarioAutenticado
  .then((result) => {
    console.log(result);
  })
  .catch((error) => {
    console.log(error);
  });
