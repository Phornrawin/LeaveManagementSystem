<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Dompdf\Dompdf;
use Carbon\Carbon;

class CategoriesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $categories = \App\Category::all();
        return view('admins.categories.view', compact('categories'));
    }

      public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:4'
        ]);
        try{
            $category = new Category;
            $category->name = $request->input("name");
            $category->days = $request->input("days");
            $category->save();
            return redirect("/admin/categories/view");
        }catch(Exception $e){
            return back()->withInput();
        }
    }

    public function edit(Category $category)
    {
        return view('admins.categories.edit', compact("category"));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => "required|max:255|min:4|unique:categories,name,$category->id"
        ]);
        try{
            $category->name = $request->input("name");
            $category->days = $request->input("days");
            $category->save();
            return redirect("/admin/categories/view");
        }catch(Exception $e){
            return back()->withInput();
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect("/admin/categories/view");
    }
    public function getpdf(){
        $pdf = new Dompdf();
        $categories = Category::all();
        $records = "<h1 style='text-align: center'> Category's report.</h1>";
        $records .= <<<'EOT'
        <table class="table table-hover table-bordered table-striped">
          <tr>
            <th>Category's name</th>
            <th>Days amount</th>
          </tr>'
EOT;
        foreach($categories as $category){
        $records.= <<<"EOT"
            <tr>
                    <td>
                      <a>
                         $category->name 
                      </a>
                    </td>
                    <td>
                      <a>
                         $category->days 
                      </a>
                    </td>
            </tr>
EOT;
        }
        $records.="</table>";
        $pdf->loadHtml($records);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream('Category report'.Carbon::now());

        return view('admin.categories.view');
    }

}
