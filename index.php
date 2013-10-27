<?php
require 'common.php';

html_header('The TeloPIN: Home');
html_menu();
html_left();
echo <<<END
        <div class="title_center">Welcome to TeloPIN Database</div>
        <div class="box_center">
            <p>Telomeric Proteins Interaction Network(TeloPIN) Database is a collection of telomeric proteins
            Protein-Protein Interaction (PPI), Protein-DNA interaction and Protein-RNA interaction data in mammalian from scientific literature and GEO database.
            The goal of database is facilitate the understanding of the molecular interaction network of telomeric proteins by providing provide comprehensive 
            information on protein-protein, protein-DNA and protein-RNA interaction of telomeres. 
            </p>
        </div>
        <div class="title_center">Introduction</div>
        <div class="box_center">
            <p>
            <img src="images/Homepage.png" height="600" width="800" alt="Homepage.png" />
            </p>
            <p>
            Mammalian telomeres are capped by protein complexes assembled around the six
            core telomeric proteins TRF1, TRF2, RAP1, TIN2, TPP1, and POT1.This six proteins form a complex termed telosome/shelterin.
            The function and interaction network of telosome/shelterin on telomeres has been studied extensively. 
            Recently, accumulating evidence has suggested extratelomeric roles for these proteins in various biological process and diseases by binding to other chromosome loci.
            In additon to telomeric DNA and proteins component, telomeres are constitutively transcribed into a long non-coding RNA called telomeric repeat-containing RNA(TERRA).
            TERRA interacts with telomeric proteins to become a part of telomeric regulatory network.Deciphering and integrating the interaction of telomeric proteins data will help to board our deep understanding to telomere biology and diseases.
            </p>
        </div>

END;
html_footer();
?>
