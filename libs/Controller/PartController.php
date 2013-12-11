<?php
/** @package    Car Reliability-inator ::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Part.php");

/**
 * PartController is the controller class for the Part object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package Car Reliability-inator ::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class PartController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of Part objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Part records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new PartCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Make,Model,Partno,Partname,Price'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$parts = $this->Phreezer->Query('Part',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $parts->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $parts->TotalResults;
				$output->totalPages = $parts->TotalPages;
				$output->pageSize = $parts->PageSize;
				$output->currentPage = $parts->CurrentPage;
			}
			else
			{
				// return all results
				$parts = $this->Phreezer->Query('Part',$criteria);
				$output->rows = $parts->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single Part record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('partno');
			$part = $this->Phreezer->Get('Part',$pk);
			$this->RenderJSON($part, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Part record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$part = new Part($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			$part->Make = $this->SafeGetVal($json, 'make');
			$part->Model = $this->SafeGetVal($json, 'model');
			$part->Partno = $this->SafeGetVal($json, 'partno');
			$part->Partname = $this->SafeGetVal($json, 'partname');
			$part->Price = $this->SafeGetVal($json, 'price');

			$part->Validate();
			$errors = $part->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				// since the primary key is not auto-increment we must force the insert here
				$part->Save(true);
				$this->RenderJSON($part, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Part record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('partno');
			$part = $this->Phreezer->Get('Part',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			$part->Make = $this->SafeGetVal($json, 'make', $part->Make);
			$part->Model = $this->SafeGetVal($json, 'model', $part->Model);
			// this is a primary key.  uncomment if updating is allowed
			// $part->Partno = $this->SafeGetVal($json, 'partno', $part->Partno);

			$part->Partname = $this->SafeGetVal($json, 'partname', $part->Partname);
			$part->Price = $this->SafeGetVal($json, 'price', $part->Price);

			$part->Validate();
			$errors = $part->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$part->Save();
				$this->RenderJSON($part, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{

			// this table does not have an auto-increment primary key, so it is semantically correct to
			// issue a REST PUT request, however we have no way to know whether to insert or update.
			// if the record is not found, this exception will indicate that this is an insert request
			if (is_a($ex,'NotFoundException'))
			{
				return $this->Create();
			}

			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Part record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('partno');
			$part = $this->Phreezer->Get('Part',$pk);

			$part->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
