<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Product;
use App\Offer;
use DB;


class GestionController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function read()
    {
        $id=auth()->user()->id;
        $products=Product::all()->where('user_id',$id);
        $offers=DB::table('offers')->where('best_rank',1)->where('buyer_id',$id)->get();
        //Product::with('offers');
        //$id=auth()->user()->id;
       // $products=DB::table('products')->where('id',$id);
        return view('home')->with('products',$products)->with('offers',$offers);
    
    }


    public function create()
    {

        return view('product.create');
    }

    public function store(Request $request)
    {

       $data=Array();
       $info=Array();
       $code=$request->product_name;
       $data['product_name'] = $request->product_name;
       $data['product_code'] = $request->product_code;
       $data['description'] = $request->description;
       $data['product_category'] = $request->product_category;
       $data['pro_sol'] = $request->min_price;
       $data['user_id']=auth()->user()->id;
       $logo=$request->file('image');
       if($logo){
           $logo_name= time() . '.' . strtolower($logo->getClientOriginalExtension());
           $upload_path='public/products_images';
           $success=$logo->move($upload_path,$logo_name);
           $data['image'] = $logo_name;
        }else {
            $default='default.jpg';
            $data['image']=$default;  
        }
       $product=DB::table('products')->insert($data);
       $idd=DB::table('products')->where('product_name',$code)->first();
       $info['product_id'] = $idd->id;
       $info['best_offer']=$request->min_price;
       $info['buyer_id']=auth()->user()->id;
       $offer=DB::table('offers')->insert($info);
       $product_id=DB::table('products')->orderBy('id', 'desc')->first();
       return redirect('/home')->with('success','Produit ajouté avec succès');
    } //redirect('/home')->with('success','Produit ajouté avec succès')

    public function edit($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        return view('product.edit')->with('product',$product);
       
    }
    public function update(Request $request,$id)
    {
        $oldimage=$request->old_image;
        $data=Array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['description'] = $request->description;
        $logo=$request->file('image');
        if($logo){
            unlink('public/products_images/'.$oldimage);
            $logo_name= time() . '.' . strtolower($logo->getClientOriginalExtension());
            $upload_path='public/products_images';
            $success=$logo->move($upload_path,$logo_name);
            $data['image'] = $logo_name;
        }
        $product=DB::table('products')->where('id',$id)->update($data);

        return redirect('/home')->with('success','Produit modifié avec succès');
     
    
       
    }

    
    public function delete($id)
    {   
        $offers=DB::table('offers')->where('product_id',$id);   
        $offers->delete();  
        $comments=DB::table('comments')->where('product_id',$id);
        $comments->delete();
        $product=Product::find($id);
        $product->delete();
        
        return redirect('/home')->with('success','Produit supprimé avec succès');
        
    }

    public function show($id)
    {
        
        $product=Product::find($id);
        $offer=DB::table('offers')->where('product_id',$id)->orderBy('best_offer', 'desc')->first();
        if($offer===NULL){
        $first_offer=Offer::create(['product_id' => $id]); 
        $first_offer->save();
        $offer=DB::table('offers')->where('product_id',$id)->orderBy('best_offer', 'desc')->first();
        }
        return view('product.show')->with('product',$product)->with('offer',$offer); 
        //->with(compact('product', 'offer','timer'));
        
       
        
       
    }

    public function offer(Request $request,$id)
    {
       
       $offer=Offer::firstOrCreate(['product_id' => $id],['buyer_id' => $request->user_id]); 
       $offer->save();
       // $data=Array();
       // $data['best_offer'] = $request->best_offer;
       // $data['best_buyer_id'] = $buyer_id;
       // Product::insert($data)->where('id', 1);
       //->orderBy('best_offer', 'desc')->first()   
        $buyer_id= auth()->user()->id;
        $data=Array();
        $precedent_offer=DB::table('offers')->where('product_id',$id)->orderBy('best_offer', 'desc')->first();
        $test=$precedent_offer->best_offer;
        $req_bo=$request->best_offer;
        if($test<$req_bo){
        $br=$precedent_offer->best_rank; 
        $id_po=$precedent_offer->id;
        $ps['pro_sol'] = $request->best_offer;             
        $data['best_offer'] = $request->best_offer;
        $data['buyer_id'] = $buyer_id;
        $data['product_id']=$id;
        $inf['best_rank']=$br+1;
        DB::table('offers')->where('id',$id_po)->update($inf);
        $offers=DB::table('offers')->insert($data);
        DB::table('products')->where('id',$id)->update($ps);
        //$min=DB::table('offers')->where('product_id',$id)->min('best_offer');
        //$deleted_offers=DB::table('offers')->where('product_id',$id)->where('best_offer', $min)->delete();
        $offer=DB::table('offers')->where('product_id',$id)->orderBy('best_offer', 'desc')->first();
        $info['success']='Offre acceptée';
        return Redirect::back()->with($info);
        //Redirect::back()->with('offer' , $offer);
       // ->with(['offer'=>$offer]);
       //->with(['success'=>'Offre acceptée','offer'=>$offer])
        }
        else{
        return Redirect::back()->with('refus','Offre insuffisante'); 
        }
      

    }

   // ->with('success','Offre acceptée') return redirect()->action('GestionController@show', ['id' => $id])->with('offer',$offer);





   public function offers()
   {
       $my_id=auth()->user()->id;
       $offers=Offer::with('product')->where('best_rank',1)->where('buyer_id',$my_id)->get();
       return view('offers')->with('offers',$offers);
   }



   public function accept($id){
        $data=Array();
        $info=Array();
        $info['state_show'] =1;
        $data['state'] =1;
        $prod=DB::table('offers')->where('id',$id)->first();
        $pid=$prod->product_id;
        DB::table('products')->where('id',$pid)->update($info);
        DB::table('offers')->where('id',$id)->update($data);
        return redirect()->back();
   }
   
   public function refuse($id){
    $data=Array();
    $info=Array();
    $info['state_show'] =2;
    $data['state'] =2;
    $prod=DB::table('offers')->where('id',$id)->first();
    $pid=$prod->product_id;
    DB::table('products')->where('id',$pid)->update($info);
    DB::table('offers')->where('id',$id)->update($data);
    return redirect()->back();
    }

    public function offerdelete($id)
   {
       $my_id=auth()->user()->id;
       DB::table('offers')->where('product_id',$id)->where('buyer_id',$my_id)->delete();
       $data['best_rank'] =1;
       $offer=DB::table('offers')->where('product_id',$id)->orderBy('best_offer', 'desc')->first();
       $oid=$offer->id;
       DB::table('offers')->where('id',$oid)->update($data);
       $off_sol=DB::table('offers')->where('id',$oid)->first();
       $ps['pro_sol']=$off_sol->best_offer;
       DB::table('products')->where('id',$id)->update($ps);
       return redirect()->back();
      
   }
}
