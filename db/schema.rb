# encoding: UTF-8
# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# Note that this schema.rb definition is the authoritative source for your
# database schema. If you need to create the application database on another
# system, you should be using db:schema:load, not running all the migrations
# from scratch. The latter is a flawed and unsustainable approach (the more migrations
# you'll amass, the slower it'll run and the greater likelihood for issues).
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema.define(version: 20140206172941) do

  # These are extensions that must be enabled in order to support this database
  enable_extension "plpgsql"

  create_table "classrooms", force: true do |t|
    t.integer  "course_id"
    t.integer  "period_id"
    t.string   "name"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "classrooms", ["course_id"], name: "index_classrooms_on_course_id", using: :btree
  add_index "classrooms", ["period_id"], name: "index_classrooms_on_period_id", using: :btree

  create_table "classrooms_students", id: false, force: true do |t|
    t.integer "classroom_id"
    t.integer "student_id"
  end

  add_index "classrooms_students", ["classroom_id", "student_id"], name: "index_classrooms_students_on_classroom_id_and_student_id", using: :btree

  create_table "courses", force: true do |t|
    t.integer  "school_id"
    t.string   "name"
    t.string   "short_description"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "courses", ["school_id"], name: "index_courses_on_school_id", using: :btree

  create_table "grades", force: true do |t|
    t.integer  "student_id"
    t.integer  "teacher_class_id"
    t.decimal  "grade"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "grades", ["student_id"], name: "index_grades_on_student_id", using: :btree
  add_index "grades", ["teacher_class_id"], name: "index_grades_on_teacher_class_id", using: :btree

  create_table "periods", force: true do |t|
    t.integer  "school_id"
    t.integer  "order"
    t.string   "name"
    t.string   "short_description"
    t.datetime "created_at"
    t.datetime "updated_at"
    t.integer  "school_year_id"
  end

  add_index "periods", ["school_id"], name: "index_periods_on_school_id", using: :btree
  add_index "periods", ["school_year_id"], name: "index_periods_on_school_year_id", using: :btree

  create_table "roles", force: true do |t|
    t.string   "name"
    t.integer  "resource_id"
    t.string   "resource_type"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "roles", ["name", "resource_type", "resource_id"], name: "index_roles_on_name_and_resource_type_and_resource_id", using: :btree
  add_index "roles", ["name"], name: "index_roles_on_name", using: :btree

  create_table "school_years", force: true do |t|
    t.integer  "year"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "school_years", ["year"], name: "index_school_years_on_year", unique: true, using: :btree

  create_table "schools", force: true do |t|
    t.string   "name"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  create_table "students", force: true do |t|
    t.integer  "user_id"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "students", ["user_id"], name: "index_students_on_user_id", using: :btree

  create_table "subjects", force: true do |t|
    t.integer  "school_id"
    t.string   "name"
    t.string   "short_description"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "subjects", ["school_id"], name: "index_subjects_on_school_id", using: :btree

  create_table "teacher_classes", force: true do |t|
    t.integer  "teacher_id"
    t.integer  "subject_id"
    t.integer  "classroom_id"
    t.string   "weekday"
    t.time     "start_time"
    t.time     "end_time"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "teacher_classes", ["classroom_id"], name: "index_teacher_classes_on_classroom_id", using: :btree
  add_index "teacher_classes", ["subject_id"], name: "index_teacher_classes_on_subject_id", using: :btree
  add_index "teacher_classes", ["teacher_id"], name: "index_teacher_classes_on_teacher_id", using: :btree

  create_table "teachers", force: true do |t|
    t.integer  "user_id"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "teachers", ["user_id"], name: "index_teachers_on_user_id", using: :btree

  create_table "users", force: true do |t|
    t.string   "email",                  default: "", null: false
    t.string   "encrypted_password",     default: "", null: false
    t.string   "reset_password_token"
    t.datetime "reset_password_sent_at"
    t.datetime "remember_created_at"
    t.integer  "sign_in_count",          default: 0,  null: false
    t.datetime "current_sign_in_at"
    t.datetime "last_sign_in_at"
    t.string   "current_sign_in_ip"
    t.string   "last_sign_in_ip"
    t.datetime "created_at"
    t.datetime "updated_at"
    t.string   "name"
    t.date     "birthdate"
    t.string   "gender"
  end

  add_index "users", ["email"], name: "index_users_on_email", unique: true, using: :btree
  add_index "users", ["reset_password_token"], name: "index_users_on_reset_password_token", unique: true, using: :btree

  create_table "users_roles", id: false, force: true do |t|
    t.integer "user_id"
    t.integer "role_id"
  end

  add_index "users_roles", ["user_id", "role_id"], name: "index_users_roles_on_user_id_and_role_id", using: :btree

end
