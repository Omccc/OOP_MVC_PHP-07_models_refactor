<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\PictureManager;
use joshtronic\LoremIpsum;

class HomeController extends Controller{

    public function index(){
        $pic = new PictureManager();
        $pictures = $pic->getAll(3);
        $lipsum = new LoremIpsum();
        $this->render('./views/template_home.phtml',[
            'pictures' => $pictures,
            'lorem' => $lipsum->paragraph(10) 
        ]);
    }

}

// $lipsum = new joshtronic\LoremIpsum();
// echo "<h1> hello composer world!</h1>";
// $rand = rand (2,300); // variable nombre de paragraphes
// echo '5 paragraphs: ' . $lipsum->paragraphs($rand);
// echo '5 sentences: ' . $lipsum->sentences($rand);
// echo '1 sentence: '  . $lipsum->sentence();
// echo '5 sentences: ' . $lipsum->sentences(5);