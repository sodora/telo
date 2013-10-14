<?php
require 'common.php';

html_header('The TeloPIM: Home');
html_menu();
html_left();
echo <<<END
        <div class="title_center">What is TeloPIM?</div>
        <div class="box_center">
            <p>Telomeric Proteins Interaction in Mammalian Database is a collection of telomeric proteins
            Protein-Protein Interaction (PPI),Proteins-DNA interaction and Protein-RNA interaction data .
            from scientific literature and GEO database.
            </p>
        </div>
        <div class="title_center">Background</div>
        <div class="box_center">
            <p>Human telomeres are bound and protected by protein complexes assembled around the six
            core telomeric proteins RAP1, TRF1, TRF2, TIN2, TPP1, and POT1. The function of these
            proteins on telomeres has been studied exten-sively. Recently, increasing evidence has
            suggested possible roles for these proteins outside of telomeres. However, the non-canonical
            (extra-telomeric) function of human telomeric proteins remains poorly understood.
            </p>
            <p>Protein-protein interactions (PPI) represent a pivotal aspect of protein function. Almost
            every cellular process relies on transient or permanent physical binding of two or more
            proteins in order to accomplish the respective task. Comprehensive databases of PPI in
            Saccharomyces cerevisiae have proved to be invaluable resources for both bioinformatics and
            experimental research and are used heavily in the scientific community.
            </p>
            <p>Although yeast is a well established model organism, not all interactions in higher
            eukaryotes have equivalent counterparts in unicellular systems. Currently, publicly available
            PPI databases contain comparatively few entries from mammals so we embarked on building a
            high-quality, manually curated database of protein-protein interactions in mammals.
            </p>
        </div>

END;
html_footer();
?>
