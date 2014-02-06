class RemoveSchoolFromStudents < ActiveRecord::Migration
  def change
    remove_reference :students, :school, index: true
  end
end
