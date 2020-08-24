    </section>
    <div class="container">
        <footer class="site-footer">        
            <div class="footer-grid">
                <div class="footer-grid-left">
                    <?php dynamic_sidebar('footer-area-one-sidebar'); ?>
                </div>
                <div class="footer-grid-right">
                    <p>Copyright &copy; Wave Plumbing <?php echo date("Y"); ?> </p>
                </div>
            </div>
            <div class="sub-footer">
                <div class="footer-images">
                    <?php dynamic_sidebar('sub-footer-area-one-sidebar'); ?>
                </div>
                <div class="footer-info">
                    <?php dynamic_sidebar('sub-footer-area-two-sidebar'); ?>
                </div>
            </div>
        </footer>
    </div>

    <?php wp_footer(); ?>
</body>
</html>