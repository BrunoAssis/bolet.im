class RemoveSchoolYearFromClassrooms < ActiveRecord::Migration
  def change
    remove_reference :classrooms, :school_year, index: true
  end
end
