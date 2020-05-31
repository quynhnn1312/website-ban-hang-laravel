<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestArticle;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Str;

class AdminArticleController extends Controller
{

    public function index(Request $request)
    {
        $articles = Article::whereRaw(1);

        if($request->name) $articles->where('ar_name', 'like', '%'.$request->name.'%');

        $articles = $articles->orderByDesc('id')->paginate(10);

        $viewData = [
            'articles' => $articles
        ];

        return view('admin::article.index', $viewData);
    }

    public function create()
    {
        return view('admin::article.create');
    }

    public function store(RequestArticle $requestArticle)
    {
        $this->insertOrUpdate($requestArticle);
        Session::put('message', 'Thêm mới tin tức thành công !');
        return redirect()->back();
    }

    public function edit($id)
    {
        $article = Article::find($id);

        return view('admin::article.update', compact('article'));
    }

    public function  update(RequestArticle $requestArticle, $id)
    {
        $this->insertOrUpdate($requestArticle, $id);
        Session::put('message', 'Cập nhật tin tức thành công !');
        return redirect()->back();
    }

    public function insertOrUpdate($requestArticle, $id='')
    {
        $article = new Article();

        if($id) $article = Article::find($id);

        $article->ar_name = $requestArticle->ar_name;
        $article->ar_slug = Str::slug($requestArticle->ar_name, '-');
        $article->ar_description = $requestArticle->ar_description;
        $article->ar_content = $requestArticle->ar_content;
        $article->ar_title_seo = $requestArticle->ar_title_seo ? $requestArticle->ar_title_seo : $requestArticle->ar_name;
        $article->ar_description_seo = $requestArticle->ar_description_seo;

        if($requestArticle->hasFile('ar_avatar'))
        {
            $file = upload_image('ar_avatar');
            if(isset($file['name']))
            {
                $article->ar_avatar = $file['name'];
            }
        }
        $article->save();
    }

    public function action(Request $request, $action, $id)
    {
        if($action)
        {
            $article = Article::find($id);
            switch ($action)
            {
                case 'delete':
                    $article->delete();
                    break;

                case 'status':
                    $article->ar_status = $article->ar_status ? 0 : 1;
                    $article->save();
                    break;
            }
        }

        return redirect()->back();
    }
}
