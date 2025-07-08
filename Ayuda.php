<?php include_once "cliente_menu.php" ?>
<head>
    <title>Ayuda - Floristería</title>
</head>
<body id="pagina-ayuda">
    <header class="text-center py-5">
        <h1>Centro de Ayuda</h1>
        <p>Encuentra respuestas a tus preguntas frecuentes</p>
    </header>

    <div class="container my-5">
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        ¿Cómo realizo un pedido?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Para realizar un pedido, selecciona los productos que deseas y agréguelos al carrito. Luego, sigue el proceso de pago y recibirás un correo de confirmación.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        ¿Cuáles son los métodos de pago disponibles?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Aceptamos pagos con tarjeta de crédito, débito y PayPal.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        ¿Puedo cancelar o modificar mi pedido?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Sí, puedes cancelar o modificar tu pedido dentro de la primera hora después de haberlo realizado.
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Sección de Soporte -->
     <div class="container text-center my-5">
        <h3>¿Necesitas más ayuda?</h3>
        <p>Puedes comunicarte con nuestro equipo de soporte para asistencia personalizada.</p>
        
        <p><strong>Teléfono:</strong> <a href="tel:+123456789" class="text-dark">+1 234 567 89</a></p>

        <!-- Botón de WhatsApp -->
        <a href="https://wa.me/123456789" target="_blank" class="btn btn-success">
            <i class="bi bi-whatsapp"></i> Chatear por WhatsApp
        </a>
    </div>
    
    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
            <p><a href="Privacidad.php" class="text-white">Política de Privacidad</a> | <a href="Terminos.php" class="text-white">Términos y
                    Condiciones</a></p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>