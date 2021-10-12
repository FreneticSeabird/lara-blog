<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'Lorem elsass',
                'slug' => Str::of('Lorem elsass')->slug('-'),
                'content' => "Lorem Elsass ipsum Spätzle ullamcorper nüdle vulputate réchime Pellentesque eget munster mamsell ante rossbolla so sit condimentum merci vielmols id, tristique geïz leo Chulien baeckeoffe hoplageiss nullam auctor, hopla quam, morbi Kabinetpapier ornare Oberschaeffolsheim non wurscht libero, porta wie bissame amet leverwurscht Richard Schirmeck in, hop DNA, mollis placerat senectus météor tellus  ftomi! Miss Dahlias gewurztraminer salu kartoffelsalad hopla rucksack jetz gehts los Oberschaeffolsheim elementum sagittis schneck amet, rhoncus chambon eleifend adipiscing geht's Gal. Yo dû. schpeck und kougelhopf Chulia Roberstau Morbi sed turpis kuglopf sit Strasbourg bredele schnaps picon bière consectetur messti de Bischheim ac amet barapli tellus Wurschtsalad hopla libero, Huguette id pellentesque quam. ornare elit Mauris libero. aliquam commodo Christkindelsmärik turpis, ac hopla risus, Coopé de Truchtersheim ch'ai sit gravida semper tchao bissame mänele purus knack yeuh. Pfourtz ! dignissim Gal ! et knepfle Salu bissame non s'guelt sed habitant Carola Verdammi lotto-owe Hans gal varius dui Salut bisamme lacus vielmols, leo suspendisse Heineken flammekueche dolor blottkopf, Racing.
                
                Lorem Elsass ipsum ac tellus Mauris gravida schneck kuglopf und non quam, lacus dignissim Miss Dahlias hop  wurscht blottkopf, sit yeuh. ante Hans gal pellentesque consectetur knepfle vielmols, Richard Schirmeck picon bière adipiscing hopla hopla habitant rossbolla chambon lotto-owe ornare Yo dû. senectus schnaps non munster purus geïz Carola mamsell turpis Kabinetpapier rhoncus kougelhopf nüdle Morbi geht's bredele mollis vulputate tristique Christkindelsmärik hopla amet, wie amet schpeck Racing. tellus Pfourtz ! Huguette so knack messti de Bischheim ullamcorper eleifend ac gewurztraminer Wurschtsalad elementum ornare Verdammi ftomi! bissame condimentum Gal ! Salu bissame sed dolor baeckeoffe Chulien Heineken porta Gal. semper jetz gehts los varius Pellentesque sagittis sed leo libero. et eget libero, elit nullam kartoffelsalad salu flammekueche auctor, réchime mänele Coopé de Truchtersheim ch'ai hoplageiss in, turpis, risus, sit Strasbourg id tchao bissame sit leverwurscht barapli suspendisse rucksack météor placerat DNA, hopla quam. s'guelt merci vielmols id, aliquam leo Salut bisamme dui amet commodo Oberschaeffolsheim Oberschaeffolsheim Spätzle libero, Chulia Roberstau morbi",
                'user_id' => 1,
                'created_at' => now()
            ]    
        ]);
    
        // Récupération de toutes les catégories
        $categories = Category::all();
        
        Post::factory()
            ->count(100)
            ->has(Comment::factory()->count(3))
            ->hasAttached($categories)
            ->create();
    }
}
