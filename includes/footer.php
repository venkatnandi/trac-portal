<?php
// includes/footer.php
?>
</main>

<!-- Footer -->
<footer>
    <div class="container">
        <div style="text-align: center; padding: var(--space-8) 0;">
            <div style="margin-bottom: var(--space-4);">
                <h3 style="font-family: var(--font-display); font-weight: 700; font-size: 1.5rem; color: var(--text-primary); margin-bottom: var(--space-2);">
                    TRAC Data Portal
                </h3>
                <p style="color: var(--text-secondary); max-width: 600px; margin: 0 auto; line-height: 1.6;">
                    Empowering data-driven decision making through comprehensive visualization and analysis of health, education, nutrition, and WASH indicators across India.
                </p>
            </div>
            
            <div style="display: flex; justify-content: center; gap: var(--space-6); margin-bottom: var(--space-6); flex-wrap: wrap;">
                <a href="education.php" style="color: var(--text-secondary); text-decoration: none; transition: color var(--transition-fast);" 
                   onmouseover="this.style.color='var(--primary-600)'" onmouseout="this.style.color='var(--text-secondary)'">Education</a>
                <a href="health.php" style="color: var(--text-secondary); text-decoration: none; transition: color var(--transition-fast);" 
                   onmouseover="this.style.color='var(--primary-600)'" onmouseout="this.style.color='var(--text-secondary)'">Health</a>
                <a href="nutrition.php" style="color: var(--text-secondary); text-decoration: none; transition: color var(--transition-fast);" 
                   onmouseover="this.style.color='var(--primary-600)'" onmouseout="this.style.color='var(--text-secondary)'">Nutrition</a>
                <a href="wash.php" style="color: var(--text-secondary); text-decoration: none; transition: color var(--transition-fast);" 
                   onmouseover="this.style.color='var(--primary-600)'" onmouseout="this.style.color='var(--text-secondary)'">WASH</a>
            </div>
            
            <div style="border-top: 1px solid var(--border-color); padding-top: var(--space-4);">
                <p style="color: var(--text-muted); font-size: 0.875rem; margin: 0;">
                    © 2025 TRAC Portal. Built with modern web technologies for optimal performance and accessibility.
                </p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
