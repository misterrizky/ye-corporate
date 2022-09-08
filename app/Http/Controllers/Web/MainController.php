<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class MainController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Welcome');
        SEOMeta::setDescription('YE is one of the Enteprise Digital Transfromation Consultant & Integrator company in Indonesia, specializing in software solutions and application delivery & managed services. Our mission is to enable enterprises to ride the wave of digital era with tech-enabled innovation & business process automation');
        SEOMeta::setCanonical('https://yadaekidanta.com');

        OpenGraph::setDescription('YE is one of the Enteprise Digital Transfromation Consultant & Integrator company in Indonesia, specializing in software solutions and application delivery & managed services. Our mission is to enable enterprises to ride the wave of digital era with tech-enabled innovation & business process automation');
        OpenGraph::setTitle('Welcome');
        OpenGraph::setUrl('http://yadaekidanta.com');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Welcome');
        TwitterCard::setSite('@YadaEkidanta');

        JsonLd::setTitle('Welcome');
        JsonLd::setDescription('YE is one of the Enteprise Digital Transfromation Consultant & Integrator company in Indonesia, specializing in software solutions and application delivery & managed services. Our mission is to enable enterprises to ride the wave of digital era with tech-enabled innovation & business process automation');
        JsonLd::addImage('https://yadaekidanta.com/img/icon.png');

        // OR

        SEOTools::setTitle('Welcome');
        SEOTools::setDescription('YE is one of the Enteprise Digital Transfromation Consultant & Integrator company in Indonesia, specializing in software solutions and application delivery & managed services. Our mission is to enable enterprises to ride the wave of digital era with tech-enabled innovation & business process automation');
        SEOTools::opengraph()->setUrl('http://yadaekidanta.com');
        SEOTools::setCanonical('https://yadaekidanta.com');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@YadaEkidanta');
        SEOTools::jsonLd()->addImage('https://yadaekidanta.com/img/icon.png');
        return view('pages.web.home.main');
    }
}
