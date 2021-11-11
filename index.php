<?php

// Normally this would be done with autoload and composer
include 'model/baseModel.php';
include 'model/membersModel.php';
include 'model/dogsModel.php';

class WGR_ExamplePageModel extends WGR_BaseModel
{
	/**
	 * @var array
	 */
	public $members;

    /**
     * @var array
     */
    public $breeds;

	/**
	 * Loads list of members
	 */
	public function loadMembers()
	{
		$membersModel = new WGR_MembersModel($this);
		$this->members = $membersModel->getMembers('foo');
	}

    /**
     * loads list of members with Parents
     */
    public function loadMembersWithParents()
    {
        $membersModel = new WGR_MembersModel($this);
        $this->members = $membersModel->getMembersWithParents('foo');
    }

    /**
     * load breeds list from API
     */
    public function loadBreeds()
    {
        $dogsModel = new WGR_DogsModel($this);
        $this->breeds = $dogsModel->getBreeds('terrier');
    }
}

class WGR_ExamplePageView
{
	/**
	 * Renders the page
	 * @param WGR_ExamplePageModel $pageModel
	 */
	public function render($pageModel)
	{
		include 'view/startpage.php';
	}

	/**
	 * Sets response headers
	 */
	public function renderResponseHeaders()
	{
		header('Content-type: text/html; charset=UTF-8');
	}
}

class WGR_ExamplePageController
{
	public function execute()
	{
		$pageModel = new WGR_ExamplePageModel();

		$action = $_GET['action'] ?? null;
        
		if ($action === 'members') {
			$pageModel->loadMembers();
		}
        elseif ($action === 'members-parents') {
            $pageModel->loadMembersWithParents();
        }
        elseif ($action === 'breeds') {
            $pageModel->loadBreeds();
        }

		$pageView = new WGR_ExamplePageView();
		$pageView->renderResponseHeaders();
		$pageView->render($pageModel);
	}
}

$controller = new WGR_ExamplePageController();
$controller->execute();
