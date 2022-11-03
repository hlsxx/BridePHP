<?php

class BridePHP {

	public string $tablePrefix;

	public array $initModelsNames = [];

	public function __construct(
		string $dbName,
		string $userName,
		string $password
	) {
		DB::$user = $userName;
		DB::$password = $password;
		DB::$dbName = $dbName;
		DB::$encoding = 'utf8mb4_general_ci'; 
	}

	public function initModel(string $modelName) {
		$this->initModelsNames[] = $modelName;

		return new \Lib\BrideModel(
			$modelName,
			[
				'tablePrefix' => $this->tablePrefix
			]
		);
	}

	public function tablePrefix(string $tablePrefix) {
		$this->tablePrefix = $tablePrefix;
	}
}