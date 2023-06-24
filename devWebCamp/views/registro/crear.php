<main class="registro">
    <h2 class="registro__heading"><?= $titulo ?></h2>
    <p class="registro__description">Elige tu plan</p>

    <div class="paquetes__grid">
        <div class="paquete">
            <h3 class="paquete__nombre">Pase Gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
            </ul>
            <p class="paquete__precio">$0</p>

            <form action="/finalizarRegistro/gratis" method="post">
                <input type="submit" class="paquete__submit" value="Inscripción Gratis">
            </form>
        </div>
        <div class="paquete">
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Acceso a Talleres y Conferencias</li>
                <li class="paquete__elemento">Acceso a las Grabaciones</li>
                <li class="paquete__elemento">Comida del Evento</li>
                <li class="paquete__elemento">Comida y Bebida</li>
            </ul>

            <p class="paquete__precio">$199</p>
            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
        <div class="paquete">
            <h3 class="paquete__nombre">Pase Virtual</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Enlace a Talleres y Conferencias</li>
                <li class="paquete__elemento">Acceso a las Grabaciones</li>
            </ul>

            <p class="paquete__precio">$99</p>
            <div id="smart-button-container">
                <div style="text-align: center;">
                  <div id="paypal-button-container-virtual"></div>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="https://www.paypal.com/sdk/js?client-id=AToM5QOUf1OTloYtPzeT7K_qiNcHFQuU8N9ONsNRPhWJG76bNdWaJ8zHhdC8gweCfo38YKmh5iESNVri&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>

<script>
    const payment = {
        paqueteId: '',
        pagoId: ''
    }

    function initPayPalButton() {

        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'pay',
            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "description": "1",
                        "amount": {
                            "currency_code": "USD",
                            "value": 199
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    payment.pagoId = orderData.purchase_units[0].payments.captures[0].id;
                    payment.paqueteId = orderData.purchase_units[0].description;

                    enviarDatos();
                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container');

        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'pay',
            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "description": "2",
                        "amount": {
                            "currency_code": "USD",
                            "value": 99
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    payment.pagoId = orderData.purchase_units[0].payments.captures[0].id;
                    payment.paqueteId = orderData.purchase_units[0].description;

                    enviarDatos();
                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container-virtual');
    }

    async function enviarDatos() {
        console.log(payment);
        const response = await fetch('/finalizarRegistro/pagar', {
            method: 'POST',
            body: JSON.stringify(payment),
            headers: {
                'Content-Type': 'application/json'
            }
        });

        const result = await response.json();

        if (result.ok) {
            window.location.href = '/finalizarRegistro/conferencias'
        }
    }

    initPayPalButton();
</script>