<?php

namespace App\Http\Controllers\Products;

use App\Constants\Enum;
use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductRequest;
use App\Http\Resources\Orders\OrderResource;
use App\Http\Resources\Products\ProductResource;
use App\Models\Brand;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariants;
use App\Models\StartEndTime;
use App\Models\Trip;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index(Request $request){
        if($request->ajax()){
            $length = \request()->get('length', 10);
            $items = Product::query()->orderBy(getColAndDirForOrderBy()['col'], getColAndDirForOrderBy()['dir'])->filter()->paginate($length,'*','*',getPageNumber($length));
            return datatable_response($items, null, ProductResource::class);
        }
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>__('lang.home'),'active' => true],
            ['page' => '#' , 'title' =>__('lang.products'),'active' => false],
        ];
        return view('dashboard.products.index', [
            'page_title' =>__('lang.products'),
            'page_breadcrumbs' => $page_breadcrumbs,
            'collections' => Collection::query()->active()->get(),
        ]);
    }
    public function create($id = null)
    {
        $page_title = __('lang.create');
        if (isset($id)) {
            $page_title = __('lang.edit');
            try {
                $item = Product::query()->filter()->findOrFail($id);
            } catch (QueryException $exception) {
                return $this->invalidIntParameter();
            }
        }
        $page_breadcrumbs = [
            ['page' => route('dashboard.index') , 'title' =>__('lang.home'),'active' => true],
            ['page' => route('products.index') , 'title' =>__('lang.products'),'active' => true],
            ['page' => '#' , 'title' =>isset($id)?__('lang.edit'):__('lang.add'),'active' => false],
        ];
        return view('dashboard.products.create', [
            'page_title' =>$page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'item' => @$item?(new ProductResource($item))->toShow():null ,
            'collections' => Collection::query()->filter()->get(),
        ]);
    }
    public function store(ProductRequest $request, $id = null)
    {
        $data = $request->only(Product::FILLABLE);
        $products_images= $request->get('products_images',[]);


        if(isset($data['tags'])){
            $data['tags'] = convertTagsObjectToString($data['tags']);
        }
        DB::beginTransaction();
        try {

            if(isset($data['master_image'])){
                $data['master_image'] =  uploadFile($request,'product-images','master_image');
            }

            $item = Product::query()->updateOrCreate([
                'id' => $id,
            ], $data);

            if(isset($products_images)){
                foreach ($products_images as $image){
                    ProductImage::create([
                        'product_id' => $item->id,
                        'name' => $image,
                    ]);
                }
            }

            if(!is_null($id)){
                $item->variations()->delete();
            }

            foreach ($request->get('colors',[]) as $index => $color){
                $product_color_image = null;
                if(request('product_color_image') && request('product_color_image')[$index]){
                    $product_color_image =  uploadFile2(request('product_color_image')[$index],'product_color_image');
                }
                ProductVariants::create([
                    'product_id' => $item->id,
                    'color' => $color,
                    'price' => request('prices')[$index],
                    'stoke' => request('stokes')[$index],
                    'image' => $product_color_image,
                ]);
            }


            DB::commit();

            return $this->returnBackWithSaveDone();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return $this->returnBackWithSaveDoneFailed();
        }
    }

    public function delete($id){
        try {
            $item = Product::query()->filter()->findOrFail($id);
        } catch (QueryException $exception) {
            return $this->invalidIntParameter();
        }
        $item->update([
            'is_deleted' => !$item->is_deleted
        ]);
        if($item){
            return $this->response_json(true, StatusCodes::OK, 'delete done');

        }
        return $this->response_json(false, StatusCodes::INTERNAL_ERROR, 'general error');

    }


    public function uploadImages(Request $request){
        return uploadFile($request,'product-images','file');
    }
    public function removeImage(Request $request){

        $request->validate([
            'photo_id' => ['required', 'exists:product_images,id' ,'numeric'],
            'product_id' => ['required', 'exists:products,id' ,'numeric']
        ]);
        $photo = ProductImage::where('product_id',$request->product_id)->where('id',$request->photo_id)->first();
        if($photo){
            unlink(base_path().'/storage/app/public/product-images/'. $photo->name);
            $photo->delete();
            return response()->json([
                'status' => true,
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }
}
