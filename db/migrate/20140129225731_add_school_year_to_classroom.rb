class AddSchoolYearToClassroom < ActiveRecord::Migration
  def change
    add_reference :classrooms, :school_year, index: true
  end
end
