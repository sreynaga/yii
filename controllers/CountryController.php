<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

class CountryController extends Controller
{

	public function actionIndex()
	{
		$query = Country::find();

		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount'      => $query->count(),
		]);

		$countries = $query->orderBy('name')->offset($pagination->offset)->limit($pagination->limit)->all();

		$arrData['countries']  = $countries;
		$arrData['pagination'] = $pagination;

		return $this->render('index', $arrData);
	}

}