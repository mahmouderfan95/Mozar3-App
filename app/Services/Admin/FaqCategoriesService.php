<?php
namespace App\Services\Admin;

use App\Http\Requests\Admin\PostHarvestServicesDepartment\Store;
use App\Models\FaqCategory;
use App\Models\PostHarvestServicesDepartment;
use App\Models\PostHarvestServicesDepartmentField;
use Illuminate\Http\Request;

class FaqCategoriesService{
    public function __construct(public FaqCategory $faqCategory){}
    public function index($per = 20)
    {
        $name = request()->has('search') ? request()->get('search') : null;
        $is_active = request()->has('is_active') ? request()->get('is_active') : 'all';
        $data = $this->faqCategory
                ->query()
                ->when($name && $name !== null, fn ($q) => $q->where('name', 'like', "%$name%"))
                ->when($is_active && $is_active !== 'all', fn ($q) => $q->where('is_active',$is_active))
                ->orderBy('id', 'desc')
                ->paginate($per);
        return view('admin.faq-categories.index',compact('data'));
    }
    public function create()
    {
        return view('admin.faq-categories.create');
    }
    public function store($data)
    {
        $data['is_active'] = isset($data['is_active']) && $data['is_active'] ? true : false;
        if(isset($data['image'])){
            $uploadImage = uploadFile($data['image'],'uploads/faqCategories');
            $data['image'] = $uploadImage;
        }
        $faqCategory = $this->faqCategory->create($data);
        return redirect(route('admin.faq-categories.index'));
    }
    public function edit($id)
    {
        $data = $this->getModelById($id);
        return view('admin.faq-categories.edit',compact('data'));
    }
    public function show($id)
    {
        $data = $this->getModelById($id);
        return view('admin.faq-categories.show',compact('data'));
    }
    public function update($data,$id)
    {
        $faqCategory = $this->getModelById($id);
        $data['is_active'] = isset($data['is_active']) && $data['is_active'] ? true : false;
        if($data['image'] !== null){
            $uploadImage = uploadFile($data['image'],'uploads/faqCategories');
            $data['image'] = $uploadImage;
            $faqCategory->update(['image' => $uploadImage]);
        }else{
            $faqCategory->update([
                'name' => $data['name'],
                'is_active' => $data['is_active']
            ]);
        }
        return redirect(route('admin.faq-categories.index'));
    }
    public function destroy($id)
    {
        $data = $this->getModelById($id);
        $data->delete();
        return redirect(route('admin.faq-categories.index'));
    }

    private function getModel()
    {
        return FaqCategory::class;
    }

    private function getModelById($id)
    {
        return $this->getModel()::findOrFail($id);
    }
}
