<?php
    namespace App\Http\Controllers\API\Customer;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Log;
    use App\Http\Controllers\Controller;
    use App\Models\AptitudeTest;
    use App\Models\AptitudeTestQuestion;
    use App\Models\CourseSectionQuestion;
    use App\Models\QuestionOption;

    class TestPaperController extends Controller {
        public function __construct() {
            // $this->middleware('auth:api');
        }

        public function getTests(Request $request) {
            $type   = $request->query('type');
            $param1 = $request->query('p1');
            $param2 = $request->query('p2');

            $tests = AptitudeTest::select('id','test_name')->where('param1', $param1)->where('param2', $param2)->get();
            return response()->json($tests);
        }

        public function getTestPaper(Request $request) {
            $testId = (int) $request->query('id');

            if ($testId < 206) {
                $questionIds = AptitudeTestQuestion::select('question_id')->where('test_id', $testId)->pluck('question_id')->toArray();
                $questions = CourseSectionQuestion::select('id','section_id AS sid','part_no AS pno','question_no AS qno','question AS q','answer AS c','explanation AS e')
                    ->whereIn('id', $questionIds)
                    ->where('status', 1)
                    ->get();

                foreach ($questions as $question) {
                    $options = QuestionOption::select('id','opt_number AS on','option AS op')
                        ->where('question_id', $question->id)
                        ->get();

                    $question->o = $options;
                }
            } else {
                $questions = CourseSectionQuestion::select('id','section_id AS sid','part_no AS pno','question_no AS qno','question AS q','answer AS c','explanation AS e')
                    ->where('course_id', 3)
                    ->whereIn('section_id', [4,7,9,10,11])
                    ->where('status', 1)
                    ->get();

                foreach ($questions as $question) {
                    $options = QuestionOption::select('id','opt_number AS on','option AS op')
                        ->where('question_id', $question->id)
                        ->get();

                    $question->o = $options;
                }
            }

            return response()->json($questions);
        }
    }
?>
