<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Question;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table("questions")->insert(
    	[ 
    		[
			    "question" => "How do I change my password?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 1
    		],

    		[

			    "question" => "How do I sign up?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => "2018-05-13 00:08:11",
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 1
    		],

			[

			    "question" => "How does syncing work?",
			    "author_question" => "guest2",
			    "author_email" => "guest2@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 2
    		],

    		[

			    "question" => "How do I upload files from my phone or tablet?",
			    "author_question" => "guest2",
			    "author_email" => "guest2@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 2
    		],

    		[

			    "question" => "How do I change my password?",
			    "author_question" => "guest3",
			    "author_email" => "guest3@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 3
    		],

    		[

			    "question" => "How do I delete my account?",
			    "author_question" => "guest3",
			    "author_email" => "guest3@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 3
    		],

    		[

			    "question" => "Can I have an invoice for my subscription?",
			    "author_question" => "guest4",
			    "author_email" => "guest4@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 4
    		],

    		[

			    "question" => "Why did my credit card or PayPal payment fail?",
			    "author_question" => "guest4",
			    "author_email" => "guest4@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 4
    		],

    		[

			    "question" => "Can I specify my own private key?",
			    "author_question" => "guest5",
			    "author_email" => "guest5@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 5
    		],

    		[

			    "question" => "My files are missing! How do I get them backsss?",
			    "author_question" => "guest5",
			    "author_email" => "guest5@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 5
    		],

    		[

			    "question" => "What should I do if my order hasn't been delivered yet?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 6
    		],

    		[

			    "question" => "How can I find your international delivery information?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 6
    		],

    		[

			    "question" => "Who takes care of shipping?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 6
    		],

    		[

			    "question" => "How do returns or refunds work?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 6
    		],

    		[

			    "question" => "How do I change my password?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 1
    		],

    		[

			    "question" => "How do I use shipping profiles?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 6
    		],

    		[

			    "question" => "How does your UK Next Day Delivery service work?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 6
    		],

    		[

			    "question" => "I forgot my password. How do I reset it?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 3
    		],

    		[

			    "question" => "Why does my bank statement show multiple charges for one upgrade?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 4
    		],

    		[

			    "question" => "When will my order ship?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 6
    		],

    		[

			    "question" => "How do I change?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 1
    		],

    		[

			    "question" => "How much does it cost for me?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 4
    		],

    		[

			    "question" => "What is it?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 1
    		],

    		[

			    "question" => "Can I pay by Visa?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 3
    		],

    		[

			    "question" => "How do are you?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 1
    		],

    		[

			    "question" => "Can I pay by nothing?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 3
    		],

    		[

			    "question" => "Samsung or Apple?",
			    "author_question" => "guest1",
			    "author_email" => "guest1@mail.ru",
			    "answer" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam. hhh",
			    "answer_created_at" => Carbon::now(),
			    "created_at" => Carbon::now(),
			    "status_id" => 2,
			    "topic_id" => 2
    		]
    	]
    	);


    }
}
