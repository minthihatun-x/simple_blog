<style>
    .hero-header {
        background-color: orange;
        padding: 50px 0;
        text-align: center;
        color: white;
        border-radius: 10px;
    }
    /*   
        @media means: "Apply these CSS styles only on certain screen sizes".
        (max-width: 768px) means: "Apply the styles only when the screen width is 
        768 pixels or smaller" — which is tablet and mobile devices.
    */
    @media (max-width: 768px) {  
        .hero-header h1 { 
            font-size: 30px;
        }
    }
</style>

<div class="container mt-4">
    <header class="hero-header">
        <h1>Simple PHP Blog</h1>
    </header>
</div>
