<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Advertisement;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\GeneralSetting;
use App\Models\PostView;
use App\Models\Quote;
use App\Models\RequestForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];

        $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['title'] = "Blog";
        $data['category'] = Category::where('status', "approved")->get();
        $data['blogpost'] = Blog::where('status', "approved")->get();
        $data['slidepost'] = Blog::where(['status' => "approved", 'slide' => "1"])->get();
        $data['lastest_post'] = Blog::where(['status' => "approved"])->orderBy('id', 'Desc')->paginate(4);
        $data['top_post'] = Blog::where(['status' => "approved", 'trending' => "1"])->with('comment')->orWhereDoesntHave('comment')->orderBy('id', 'Desc')->paginate(4);
        $data['bestCategory'] = Blog::where('status', "approved")->orderBy('total_views', 'Desc')->with('comment')->orWhereDoesntHave('comment')->paginate(4);
        $data['header_adverts'] = Advertisement::where('position', "header")->latest()->limit(2)->get();
        $data['body_adverts'] = Advertisement::where('position', "body")->latest()->limit(2)->get();
        $data['footer_adverts'] = Advertisement::where('position', "footer")->latest()->limit(2)->get();
        $data['right_adverts'] = Advertisement::where('position', "right")->latest()->limit(2)->get();

        $data['recentupload'] = Blog::where(['status' => "approved", 'trending' => "0"])->orderBy('id', 'Desc')->paginate(4);
        $data['popularPost'] = Blog::where(['status' => "approved", 'trending' => "1"])
            ->with('comment')
            ->orWhereDoesntHave('comment')
            ->orderBy('total_views', 'Desc')
            ->limit(10)
            ->get();

            //dd($data['popularPost']);
        $data['recentPost'] = Blog::where('status', "approved")->with('comment')->orWhereDoesntHave('comment')->orderBy('id', 'Desc')->limit(6)->get();

        $data['popularvideo'] = Blog::where('v_status', '1')
            ->where('trending', '1')
            ->orderBy('id', 'desc')
            ->limit(6)
            ->get();
        
           // dd($data['popularvideo']);
            
        $data['best_post'] = Blog::where('status', "approved")->with('comment')->orWhereDoesntHave('comment')->orderBy('total_views', 'Desc')->limit(1)->first();



        return view('blog.home')->with($data);
    }
    public function about()
    {
        $data = [];
        $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['title'] = "About";
        $data['category'] = Category::where('status', "approved")->get();
        $data['header_adverts'] = Advertisement::where('position', "header")->latest()->limit(2)->get();
        $data['body_adverts'] = Advertisement::where('position', "body")->latest()->limit(2)->get();
        $data['footer_adverts'] = Advertisement::where('position', "footer")->latest()->limit(2)->get();
        $data['right_adverts'] = Advertisement::where('position', "right")->latest()->limit(2)->get();


        return view('blog.about')->with($data);
    }
    public function contact()
    {
        $data = [];
        $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['title'] = "Contact";
        $data['category'] = Category::where('status', "approved")->get();
        $data['contacts'] = Contact::where('pstatus', "approved")->get();
        $data['emails'] = Contact::where('estatus', "approved")->get();
        
        $data['header_adverts'] = Advertisement::where('position', "header")->latest()->limit(2)->get();
        $data['body_adverts'] = Advertisement::where('position', "body")->latest()->limit(2)->get();
        $data['footer_adverts'] = Advertisement::where('position', "footer")->latest()->limit(2)->get();
        $data['right_adverts'] = Advertisement::where('position', "right")->latest()->limit(2)->get();


        return view('blog.contact')->with($data);
    }

    public function recentPost()
    {
        $data = [];
        $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['title'] = "Recent Post";
        $data['category'] = Category::where('status', "approved")->get();
        $data['header_adverts'] = Advertisement::where('position', "header")->latest()->limit(2)->get();
        $data['body_adverts'] = Advertisement::where('position', "body")->latest()->limit(2)->get();
        $data['footer_adverts'] = Advertisement::where('position', "footer")->latest()->limit(2)->get();
        $data['right_adverts'] = Advertisement::where('position', "right")->latest()->limit(2)->get();

        $data['blogpost'] = Blog::where(['status' => "approved"])->orderBy('id', 'Desc')->with('comment')
            ->orWhereDoesntHave('comment')
            ->orderBy('total_views', 'Desc')
            ->paginate(20);

        $data['popularPost'] = Blog::where(['status' => "approved", 'trending' => "1"])
            ->with('comment')
            ->orWhereDoesntHave('comment')
            ->orderBy('total_views', 'Desc')
            ->limit(10)
            ->get();
        $data['recentPost'] = Blog::where('status', "approved")->with('comment')->orWhereDoesntHave('comment')->orderBy('id', 'Desc')->limit(10)->get();

        return view('blog.recentPost')->with($data);
    }
    public function author($id)
    {
        $data = [];
        $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['title'] = "Author Post";
        $data['category'] = Category::where('status', "approved")->get();
        $data['user'] = Admin::find($id);
        $data['header_adverts'] = Advertisement::where('position', "header")->latest()->limit(2)->get();
        $data['body_adverts'] = Advertisement::where('position', "body")->latest()->limit(2)->get();
        $data['footer_adverts'] = Advertisement::where('position', "footer")->latest()->limit(2)->get();
        $data['right_adverts'] = Advertisement::where('position', "right")->latest()->limit(2)->get();

        $data['blogpost'] = Blog::where(['status' => "approved", 'admin_id' => $id])->orderBy('id', 'Desc')->with('comment')
            ->orWhereDoesntHave('comment')
            ->orderBy('total_views', 'Desc')
            ->paginate(20);

        $data['popularPost'] = Blog::where(['status' => "approved", 'trending' => "1"])
            ->with('comment')
            ->orWhereDoesntHave('comment')
            ->orderBy('total_views', 'Desc')
            ->limit(10)
            ->get();
        $data['recentPost'] = Blog::where('status', "approved")->with('comment')->orWhereDoesntHave('comment')->orderBy('id', 'Desc')->limit(6)->get();

        return view('blog.author')->with($data);
    }
    public function category($category)
    {
        $data = [];
        $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['title'] = $category;
        $categoryActive = Category::where('status', "approved")->get();
        $data['header_adverts'] = Advertisement::where('position', "header")->latest()->limit(2)->get();
        $data['body_adverts'] = Advertisement::where('position', "body")->latest()->limit(2)->get();
        $data['footer_adverts'] = Advertisement::where('position', "footer")->latest()->limit(2)->get();
        $data['right_adverts'] = Advertisement::where('position', "right")->latest()->limit(2)->get();

        $data['category'] = $categoryActive;


        $category = Category::where('slug', $category)->first();
        $data['category_detail'] = $category;
        $category_id = $category->id;
        $data['blogpost'] = Blog::where(['status' => "approved", 'category_id' => $category_id])->paginate(50);


        return view('blog.blog')->with($data);
    }

    public function blog($category)
    {
        $data = [];
        $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['title'] = $category;
        $data['category'] = Category::where('status', "approved")->get();
        $category = Category::where('slug', $category)->first();
        $data['category_detail'] = $category;
        $category_id = $category->id;
        $data['blogpost'] = Blog::where(['status' => "approved", 'category_id' => $category_id])->paginate(20);
        $data['header_adverts'] = Advertisement::where('position', "header")->latest()->limit(2)->get();
        $data['body_adverts'] = Advertisement::where('position', "body")->latest()->limit(2)->get();
        $data['footer_adverts'] = Advertisement::where('position', "footer")->latest()->limit(2)->get();
        $data['right_adverts'] = Advertisement::where('position', "right")->latest()->limit(2)->get();

        return view('blog.blog')->with($data);
    }
    public function blogTwo($category)
    {
        $data = [];
        $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['title'] = $category;
        $data['category'] = Category::where('status', "approved")->get();
        $data['header_adverts'] = Advertisement::where('position', "header")->latest()->limit(2)->get();
        $data['body_adverts'] = Advertisement::where('position', "body")->latest()->limit(2)->get();
        $data['footer_adverts'] = Advertisement::where('position', "footer")->latest()->limit(2)->get();
        $data['right_adverts'] = Advertisement::where('position', "right")->latest()->limit(2)->get();
        $category = Category::where('slug', $category)->first();
        $data['category_detail'] = $category;
        $category_id = $category->id;
        $data['blogpost'] = Blog::where(['status' => "approved", 'category_id' => $category_id])->paginate(50);

        $data['popularPost'] = Blog::where(['status' => "approved", 'trending' => "1"])
            ->with('comment')
            ->orWhereDoesntHave('comment')
            ->orderBy('total_views', 'Desc')
            ->limit(10)
            ->get();
        $data['recentPost'] = Blog::where('status', "approved")->with('comment')->orWhereDoesntHave('comment')->orderBy('id', 'Desc')->limit(10)->get();

        return view('blog.blogTwo')->with($data);
    }
    public function post(Request $request, $slug)
    {
        $data = [];
        $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['title'] = $slug;
        $data['category'] = Category::where('status', "approved")->get();
        $data['header_adverts'] = Advertisement::where('position', "header")->latest()->limit(2)->get();
        $data['body_adverts'] = Advertisement::where('position', "body")->latest()->limit(2)->get();
        $data['footer_adverts'] = Advertisement::where('position', "footer")->latest()->limit(2)->get();
        $data['right_adverts'] = Advertisement::where('position', "right")->latest()->limit(2)->get();
        $data['quotes'] = Quote::get();

        
        $data['popularPost'] = Blog::where(['status' => "approved", 'trending' => "1"])->orderBy('id', 'Desc')->limit(6)->get();
        $data['recentPost'] = Blog::where('status', "approved")->orderBy('id', 'Desc')->limit(6)->get();
        $post = Blog::where('slug', $slug)->firstOrFail();
        $data['post'] = $post;

        $advert = "Advertisement content goes here.";

        $contentArray = explode(' ', $post->content);
        $middleIndex = ceil(count($contentArray) / 2); // Find the middle index

        // Insert the advertisement content at the middle index
        array_splice($contentArray, $middleIndex, 0, [$advert]);

        $modifiedContent = implode(' ', $contentArray);
         $data['content'] = $modifiedContent;
        //dd($modifiedContent);
        $data['comments'] = Comment::where('blog_id', $post->id)->with('replies')
            ->orWhereDoesntHave('replies') // Include comments without replies
            ->get();

        $data['relatedPost'] = Blog::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->limit(6) // Limit the number of related posts
            ->get();

        $previous_id =  $post->id - 1;
        if ($previous_id == 0) {
            $previous_id = 1;
        }
        $data['previous'] = Blog::where('id', $previous_id)->first();
        $next_id =  $post->id + 1;

        $next = Blog::where('id', $next_id)->first();
        if (empty($next)) {
            $data['next'] = Blog::where('slug', $slug)->first();
        } else {
            $data['next'] = $next;
        }

        //updating the total view
        $userIp = $request->ip();
        $check = PostView::where(['ip' => $userIp, 'blog_id' => $post->id])->first();
        if ($check) {
            $check->ip = $userIp;
            $check->blog_id = $post->id;
            $check->count = "1";
            $check->save();
        } else {
            $view = new PostView();
            $view->ip = $userIp;
            $view->blog_id = $post->id;
            $view->count = "1";
            $view->save();
            Blog::where('id', $post->id)->update([
                'total_views' => $post->total_views + 1
            ]);
        }


        return view('blog.post')->with($data);
    }

    public function searchAction(Request $request)
    {
        $data = [];
        $data['settings'] = GeneralSetting::where('id', "1")->first();
        $data['title'] = $request->input('word');
        $data['category'] = Category::where('status', "approved")->get();
        $data['header_adverts'] = Advertisement::where('position', "header")->latest()->limit(2)->get();
        $data['body_adverts'] = Advertisement::where('position', "body")->latest()->limit(2)->get();
        $data['footer_adverts'] = Advertisement::where('position', "footer")->latest()->limit(2)->get();
        $data['right_adverts'] = Advertisement::where('position', "right")->latest()->limit(2)->get();
        $search = $request->input('word');
        if (!$search) {
            $data['results'] = "";
        }
        $results = Blog::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('body', 'LIKE', '%' . $search . '%')
            ->get();

        $data['results'] = $results;

        $data['blogpost'] = Blog::where(['status' => "approved"])->orderBy('id', 'Desc')->with('comment')
            ->orWhereDoesntHave('comment')
            ->orderBy('total_views', 'Desc')
            ->paginate(20);

        $data['popularPost'] = Blog::where(['status' => "approved", 'trending' => "1"])
            ->with('comment')
            ->orWhereDoesntHave('comment')
            ->orderBy('total_views', 'Desc')
            ->limit(10)
            ->get();
        $data['recentPost'] = Blog::where('status', "approved")->with('comment')->orWhereDoesntHave('comment')->orderBy('id', 'Desc')->limit(10)->get();

        return view('blog.search_post')->with($data);
    }

    public function contactAction(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        if($validate->fails()){
            return back()->withInput()->with('error', 'Please fill up the empty space');
        }
        $data = new RequestForm();
        $data->name  = $request->name;
        $data->email  = $request->email;
        $data->message  = $request->message;
        $data->save();
        
        return back()->with('msg','Your message has been sent successfully');
    }
}